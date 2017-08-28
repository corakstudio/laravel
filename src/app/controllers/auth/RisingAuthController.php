<?php

namespace CorakStudio\Rising\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class RisingAuthController extends Controller
{
    use AuthenticatesUsers;

    public function login(){
    	return view('rising::login');
    }

    public function login_state(Request $request){
    	$this->validateLogin($request);
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    protected function credentials(Request $request)
    {
        $auth_credentials = $request->only($this->username(), 'password');
        if(config('rising.auth.email_validation')){
             $auth_credentials['is_active'] = 1;
             $auth_credentials['email_valid'] = 1; 
        }
        return $auth_credentials; 
    }

    protected function hasTooManyLoginAttempts(Request $request)
    {
        $maxLoginAttempt = config('rising.auth.max_login_attempt');
        $lockingTime = config('rising.auth.banned_time');
        return $this->limiter()->tooManyAttempts(
            $this->throttleKey($request), $maxLoginAttempt, $lockingTime
        );
    }

    protected function validateLogin(Request $request)
    {
        $rules = [
            $this->username() => 'required', 'password' => 'required', 'malicious'   => 'honeypot','malicious_'   => 'required|honeytime:5'
        ];
        if(config('rising.auth.captcha')){
            $rules['captcha'] = 'required|captcha';
        }
        $this->validate($request, $rules);
    }

}
