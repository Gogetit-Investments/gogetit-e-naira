<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\RoleController;
use DB;
use App\Mail\SignupMail;
use Illuminate\Support\Facades\Mail;

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
        
        
        
        $user = User::create($push);
        Mail::to($email)->send(new SignupMail($email, $first_name, $last_name, $password, $phone_number));
        // auth()->login($user);
        // \Log::info($user);

        return back()->with('success', "Thanks Admin. This account has been successfully registered. Kindly ask the user to check their email for login details");
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

}