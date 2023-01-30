<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Services\Login\RememberMeExpiration;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Auth\EloquentUserProvider;

class LoginController extends Controller
{
    use RememberMeExpiration;

    /**
     * Display login page.
     * 
     * @return Renderable
     */
    public function show()
    {
        return view('authentication.login');
    }

    /**
     * Handle account login request
     * 
     * @param LoginRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {
        $credentials = $request->getCredentials();

        if(!Auth::validate($credentials)):
            // return redirect()->to('/login')->withErrors(trans('auth.failed'));
            return redirect('/login')->with('error', "Wrong login credentioals or no account created yet");
        endif;

        $user = Auth::getProvider()
        // ->with(['role_info'])
        // ->with(['role_info' => function ($query) {$query->select('id', 'role_name');}])
        ->retrieveByCredentials($credentials);

        Auth::login($user, $request->get('remember'));

        if($request->get('remember')):
            $this->setRememberMeExpiration($user);
        endif;

        return $this->authenticated($request, $user);
                // return redirect('/register')->with('success', "Account successfully registered.");
                // return "Success";

    }

    /**
     * Handle response after user authenticated
     * 
     * @param Request $request
     * @param Auth $user
     * 
     * @return \Illuminate\Http\Response
     */
    protected function authenticated(Request $request, $user) 
    {
        return redirect('/dashboard')->with('success', "Account successfully registered.");
        // return redirect()->intended();
        // if (Auth::user()->role_id == null) {
        //     return redirect()->to('/login')->with('error', 'Sorry! Your account has not been activated. Please contact an admin');
    
        // } else {
            
        //     return redirect('/dashboard')->with('success', "Account successfully registered.");
        // }
        
        }
}