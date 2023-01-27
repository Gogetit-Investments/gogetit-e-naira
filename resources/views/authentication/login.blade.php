@extends('layouts.authentication.master')
@section('title', 'Login')

@section('css')
@endsection

@section('style')
@endsection

@section('content')
<div class="container-fluid p-0">
   <div class="row m-0">
      <div class="col-12 p-0">
         <div class="login-card">
            <div>
               <div><a class="logo" href="{{ route('index') }}"><img class="img-fluid for-dark" src="{{asset('assets/images/logo/logo_dark.png')}}" alt="looginpage"></a></div>
               <div class="login-main">
                  <form class="theme-form"  action="{{route('login.perform')}}" method="POST">
                     @csrf
                     <img  src="{{asset('assets/images/Gogetit-logo2.png')}}" alt="Gogetit Logo" width="200px"><br/><br/>
                     <h4>Welcome to Gogetit e-Naira Data Agents Portal</h4>
                     <p>Enter your email & password to continue</p>
                     @if(session('success'))
          <div class="alert alert-success dark" role="alert">
            {{ @session('success') }}  
          </div>
          @endif
          @if(session('error'))
          <div class="alert alert-danger dark" role="alert">
            {{ @session('error') }}  
          </div>
          @endif
                     <div class="form-group">
                        <label class="col-form-label">Email Address</label>
                        <input class="form-control {{ $errors->has('username') ? 'error' : '' }}" type="text" required name="username" placeholder="Enter email">
                                 <!-- Error -->
                                 @if ($errors->has('username'))
                                 <div class="error">
                                     {{ $errors->first('username') }}
                                 </div>
                                 @endif
                     </div>
                     <div class="form-group">
                        <label class="col-form-label">Password</label>
                        <input class="form-control" type="password" name="password" required placeholder="*********">
                        <div class="show-hide"><span class="show">                         </span></div>
                     </div>
                     <div class="form-group mb-0">
                        <div class="checkbox p-0">
                           <input id="checkbox1" type="checkbox">
                           <label class="text-muted" for="checkbox1">Remember password</label>
                        </div>
                        <a class="link" href="{{ route('forget-password') }}">Forgot password?</a>
                        <button class="btn btn-primary btn-block" type="submit">Sign in</button>
                     </div><br/>
                     <h6 >in partnership with:</h6>
                     <div >
                        {{-- <div class="btn-showcase"> --}}
                           <img  src="{{asset('assets/images/cbn_logo.png')}}" alt="CBN Logo" height="100px">
                           {{-- <a class="btn btn-light" href="https://www.linkedin.com/login" target="_blank"><i class="txt-linkedin" data-feather="linkedin"></i> LinkedIn </a><a class="btn btn-light" href="https://twitter.com/login?lang=en" target="_blank"><i class="txt-twitter" data-feather="twitter"></i>twitter</a><a class="btn btn-light" href="https://www.facebook.com/" target="_blank"><i class="txt-fb" data-feather="facebook"></i>facebook</a> --}}
                        {{-- </div> --}}
                     </div>
                     {{-- <p class="mt-4 mb-0">Don't have account?<a class="ms-2" href="{{  route('sign-up') }}">Create Account</a></p> --}}
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection

@section('script')
@endsection