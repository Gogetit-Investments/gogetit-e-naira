<?php

namespace App\Http\Controllers;

use App\Models\Consumer;
use App\Models\Lga;
use App\Models\State;
use Illuminate\Http\Request;
use App\Http\Requests\ConsumerRequest;
use App\Models\RoleController;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ConsumerImport;
use Illuminate\Support\Facades\Auth;

use App\Utilities\AppConstants;
use App\Utilities\AppHelpers;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Database\Eloquent\Relations\HasOne;




class ConsumerController extends Controller
{
    /**
     * Display register page.
     * 
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('pages.consumer-data.consumer-upload');
    }

    public function consumer_list()
    {
        return view('pages.consumer-data.consumer-list');
    }


    public function fileImport(Request $request) 
    {

        try {
            Excel::import(new ConsumerImport, $request->file('file')->store('temp'));
            // return back();
            return  back()->with('success', 'Uploaded successfully');
        } catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1062'){
               return back()->with('error', 'There was an error uploading your records. You might have some duplicates');
            }
            else{
             return back()->with('error', $e->getMessage());
            }
        }

        Excel::import(new ConsumerImport, $request->file('file')->store('temp'));
        return back();
        // return redirect('/consumer-list')->with('success', "Account successfully registered.");
    }

    /**
     * Handle account registration request
     * 
     * @param ConsumerRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function register(ConsumerRequest $request) 
    {
        $user = Consumer::create($request->validated());

        // auth()->login($user);

        return redirect('/')->with('success', "Upload successful.");
    }


    public function allConsumers()
    {

    // $consumers = Consumer::query()
    // ->select('state.state_name')
    // ->leftjoin('state', 'state.state_code','=', 'consumer_data.state_code')
    // ->orderBy('consumer_data.created_at', 'desc')->get();
    // DB::raw("CONCAT(user.first_name, ' ', user.last_name) as addedby"),
    
    $consumers = Consumer::query()
    ->where('added_by', '=', Auth::user()->id)
    ->with(['state_of_residence' => function ($query) {$query->select('state_code', 'state_name as state_of_residence');}])
    ->with(['state_of_origin' => function ($query) {$query->select('state_code', 'state_name as state_of_birth');}])
    ->with(['tier_info' => function ($query) {$query->select('code', 'description as tier_name');}])
    ->with(['lga_info' => function ($query) {$query->select('lga_code', 'lga_name as lga_of_residence');}])
    ->with(['country_info' => function ($query) {$query->select('country_code', 'country_name as country_of_residence');}])
    ->with(['country_of_origin' => function ($query) {$query->select('country_code', 'country_name as country_of_birth');}])
    ->get();

        // $consumers = DB::table('consumer_data')
        // ->select('consumer_data.*', 'user.first_name', 'user.last_name',  'state.state_name as state', )
        //     ->leftjoin('user', 'user.id', '=', 'consumer_data.added_by')
        //     // ->leftjoin('tier', 'tier.code', '=', 'consumer_data.tier_id')
        //     ->leftjoin('state', 'state.state_code', '=', 'consumer_data.state_code')
        //     ->leftjoin('tier', 'tier.code', '=', 'consumer_data.tier_id')
        //     ->where('consumer_data.added_by','=', Auth::user()->id)
        //     ->get();
// return $users;
        return view('pages.consumer-data.consumer-list', compact('consumers') );

    }


}