<?php

namespace App\Http\Controllers\Auth\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Session;
use App\Models\Student;


class LoginController extends Controller
{

    use AuthenticatesUsers;


    protected $redirectTo = '/';

    public function __construct(){
        $this->middleware('guest:web', ['except' => ['logout']]);
    }


    public function showLoginForm(){
        return view('frontend.auth.login');
    }

    public function login(Request $request){

        //Validate the form data
        $this->validate($request, [
            'email' 		=> 'required',
            'password' 		=> 'required'
        ]);


        //Attempt to log the user in
        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password, 'verify_token' => 1])) {
            //If successful then redirect to the intended location
            return redirect()->intended(route('user.dashboard'));
        }else{
            Session::flash('login_error', "Please Provide Correct Email & Password");
        }

        return redirect()->back()->withInput($request->only('email', 'remember'));
    }


    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('index');
    }
}
