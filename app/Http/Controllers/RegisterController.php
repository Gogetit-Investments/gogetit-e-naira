<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\RoleController;
use DB;

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
        $user = User::create($push);

        // auth()->login($user);
        \Log::info($user);

        return back()->with('success', "Account successfully registered.");
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