<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\RoleController;
use DB;
use App\Mail\SignupMail;
use Illuminate\Support\Facades\Mail;
use Hash;
use Auth;

class RegisterController extends Controller
{
    /**
     * Display register page.
     * 
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('auth.register');
    }

    public function create_user()
    {
        return view('pages.user.create-user');
    }

    public function create_agent()
    {
        return view('pages.user.create-agent');
    }

    public function edit_profile()
    {
        return view('pages.user.edit-profile');
    }



    // public function changePasswordPost(Request $request) {
    //     if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
    //         // The passwords matches
    //         return redirect()->back()->with("error","Your current password does not matches with the password.");
    //     }

    //     if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
    //         // Current password and new password same
    //         return redirect()->back()->with("error","New Password cannot be same as your current password.");
    //     }

    //     $validatedData = $request->validate([
    //         'current-password' => 'required',
    //         'new-password' => 'required|string|min:8|confirmed',
    //     ]);

    //     //Change Password
    //     $user = Auth::user();
    //     $user->password = bcrypt($request->get('new-password'));
    //     $user->save();

    //     return redirect()->back()->with("success","Password successfully changed!");
    // }

    public function updatePassword(Request $request)
{
        # Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);


        #Match The Old Password
        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }


        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("status", "Password changed successfully!");
}


    /**
     * Handle account registration request
     * 
     * @param RegisterRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterRequest $request) 
    {

        
        $push=$request->validated();
        $push['username'] = $push['phone_number'];
        $email=$push['email'];
        $first_name=$push['first_name'];
        $last_name=$push['last_name'];
        $password=$push['password'];
        $phone_number=$push['phone_number'];
        $coordinator_id=$push['coordinator_id'];
        
        
        
        $user = User::create($push);
        Mail::to($email)->send(new SignupMail($email, $first_name, $last_name, $password, $phone_number));
        // auth()->login($user);
        // \Log::info($user);

        return back()->with('success', "Thanks Admin. This account has been successfully registered. Kindly ask the user to check their email for login details");
    }



    public function register_agent(Request $request)
  {
    $this->validate($request, [
      'phone_number' => 'required|string',
    ]);
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
								
    // generate a pin based on 2 * 7 digits + a random character
    $pin = mt_rand(1000, 9999)
        . mt_rand(1000, 9999)
        . $characters[rand(0, strlen($characters) - 1)];
    
    // shuffle the result
    $password = str_shuffle($pin);

    // \Log::info($request->all());
    $agent = new User();
    $agent->email = $request->email;
    $agent->first_name = $request->first_name;
    $agent->last_name = $request->last_name;
    $agent->other_names = $request->other_names;
    $agent->phone_number = $request->phone_number;
    $agent->username = $request->phone_number;
    $agent->role_id = "1";
    $agent->coordinator_id = auth()->id();
    $agent->password = $password;

    $agent->save();
    Mail::to($request->email)->send(new SignupMail($request->email, $request->first_name, $request->last_name, $password, $request->phone_number));
    return back()->with('success', "Agent successfully registered.");
  }


    public function allUsers()
    {

        $users = DB::table('user')
        ->select('user.*', 'role.role_name')
            ->leftjoin('role', 'role.id', '=', 'user.role_id')
            // ->leftjoin('tier', 'tier.id', '=', 'consumer_data.tier_id')
            ->get();
// return $users;
        return view('pages.user.user-list', compact('users') );

    }


    public function my_agents()
    {
        $agents = User::query()->where('coordinator_id', '=', Auth::user()->id)->get();
        return view('pages.user.my-agents', compact('agents'));
    }


}