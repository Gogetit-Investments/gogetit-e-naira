<?php

namespace App\Http\Controllers;

use App\Models\Consumer;
use App\Models\Country;
use App\Models\Lga;
use App\Models\State;
use Illuminate\Http\Request;
use App\Http\Requests\ConsumerRequest;
use App\Models\RoleController;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ConsumerImport;
use Illuminate\Support\Facades\Auth;
use App\Models\Settings;
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

    // public function upload_show()
    // {
    //     return view('pages.consumer-data.consumer_single-upload');
    // }


    public function upload_show()
    {
        $data['country'] = Country::get(["country_code", "country_name"]);
        return view('pages.consumer-data.consumer_single-upload', $data);
    }
    public function fetchState(Request $request)
    {
        $data['state'] = State::where("country_code",$request->country_code)->get(["state_name", "state_code"]);
        return response()->json($data);
    }
    public function fetchCity(Request $request)
    {
        $data['lga'] = Lga::where("state_code",$request->state_code)->get(["lga_name", "lga_code"]);
        return response()->json($data);
    }



    public function consumer_list()
    {
        return view('pages.consumer-data.consumer-list');
    }

    public function download_templates()
    {
        return view('pages.download-template');
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
    // public function register(ConsumerRequest $request) 
    // {
        // $consumer = Consumer::create($request->validated());

        // $push=$request->validated();
        // $push['username'] = $push['phone_number'];
        // $registration_number=$push['registration_number'];
        // $first_name=$push['first_name'];
        // $last_name=$push['last_name'];
        // $password=$push['password'];
        // $phone_number=$push['phone_number'];
        // $push['user_id'] = auth()->user()->id;
        
        
        // $user = Consumer::create($push);

        // auth()->login($user);
// return redirect('/consumer_single-upload')->with('success', "Consumer successfully registered.");
// return back()->with('success', "Consumer successfully registered.");
        // return redirect('/')->with('success', "Upload successful.");
    // }

    public function register(Request $request)
  {
    $this->validate($request, [
      'phone_number' => 'required|string',
    //   'remarks' => 'required|string',
    //   'created_by' => 'required',

    ]);

    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

// generate a pin based on 2 * 7 digits + a random character
$pin = mt_rand(1000000, 9999999)
    . mt_rand(1000000, 9999999)
    . $characters[rand(0, strlen($characters) - 1)];

// shuffle the result
$string = str_shuffle($pin);
    // \Log::info($request->all());
    $consumer = new Consumer();
    $consumer->phone_number = $request->phone_number;
    $consumer->registration_number = $string;
    // $consumer->tier_id = $request->tier_id;
    // $consumer->bvn = $request->bvn;
    // $consumer->nin = $request->nin;
    $consumer->lga = $request->lga;
    $consumer->state_code = $request->state_code;
    $consumer->country = $request->country;
    $consumer->state_of_birth = $request->state_of_birth;
    $consumer->country_of_birth = $request->country_of_birth;
    $consumer->title_code = $request->title_code;

    $consumer->first_name = $request->first_name;
    $consumer->last_name = $request->last_name;
    $consumer->middle_name = $request->middle_name;
    $consumer->dob = $request->dob;
    $consumer->contact_address = $request->contact_address;
    $consumer->postal_code = $request->postal_code;
    $consumer->city = $request->city;
    
    $consumer->commission = Settings::select('agent_commission')->value('agent_commission');
    $consumer->referral_code = Settings::select('referral_code')->value('referral_code');
    $consumer->added_by = auth()->id();

    $consumer->save();

    return back()->with('success', "Consumer successfully registered.");
  }

    public function allConsumers()
    {
    $consumers = Consumer::query()
    // ->where('added_by', '=', Auth::user()->id)
    ->with(['state_of_residence' => function ($query) {$query->select('state_code', 'state_name as state_of_residence');}])
    ->with(['state_of_origin' => function ($query) {$query->select('state_code', 'state_name as state_of_birth');}])
    ->with(['tier_info' => function ($query) {$query->select('code', 'description as tier_name');}])
    ->with(['lga_info' => function ($query) {$query->select('lga_code', 'lga_name as lga_of_residence');}])
    ->with(['country_info' => function ($query) {$query->select('country_code', 'country_name as country_of_residence');}])
    ->with(['country_of_origin' => function ($query) {$query->select('country_code', 'country_name as country_of_birth');}])
    ->get();
        return view('pages.consumer-data.consumer-list', compact('consumers') );

    }


}