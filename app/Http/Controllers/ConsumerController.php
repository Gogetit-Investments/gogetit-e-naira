<?php

namespace App\Http\Controllers;

use App\Models\Consumer;
use Illuminate\Http\Request;
use App\Http\Requests\ConsumerRequest;
use App\Models\RoleController;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ConsumerImport;

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

        auth()->login($user);

        return redirect('/')->with('success', "Account successfully registered.");
    }


    public function allConsumers()
    {

        $consumers = DB::table('consumer_data')
        ->select('consumer_data.*', 'user.first_name as addedby', 'tier.tier_name')
            ->leftjoin('user', 'user.id', '=', 'consumer_data.added_by')
            ->leftjoin('tier', 'tier.id', '=', 'consumer_data.tier_id')
            ->get();
// return $users;
        return view('pages.consumer-data.consumer-list', compact('consumers') );

    }


}