<?php

namespace App\Http\Controllers\Auth\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Notifications\AccountCreateNotification;
use App\Helpers\ImageUploadHelper;
use App\Helpers\StringHelper;
use Illuminate\Http\Request;
use App\Models\User;
use Session;
use Hash;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
    * Where to redirect users after registration.
    *
    * @var string
    */
    protected $redirectTo = '/';

    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
    * Show the application registration form.
    *
    * @return \Illuminate\Http\Response
    */
    public function showRegistrationForm()
    {
        return view('frontend.auth.register');
    }

    public function register(Request $request)
    {
      // validate form data
      $this->validate($request, [
        'name' => 'required',
        'email' => 'required|unique:users',
        'phone' => 'required|unique:users',
        'city' => 'required',
        'address' => 'required',
        'account_role' => 'required',
        'designation' => 'required',
        'organization' => 'required',
        'password' => 'required',
        'confirm_password' => 'required',
      ]);

      if($request->password == $request->confirm_password){
        $user = new User();
        // insert form data
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->city = $request->city;
        $user->address = $request->address;
        $user->account_role = $request->account_role;
        $user->designation = $request->designation;
        $user->organization = $request->organization;
        $user->password = Hash::make($request->password);
        $user->username = StringHelper::createSlug($request->name, 'User', 'username');
        $user->image = ImageUploadHelper::upload('image', $request->file('image'), time(), 'public/images/users');
        $user->verify_token = Hash::make(str_random(16));
        $user->save();

        $user->notify(new AccountCreateNotification($user));

        session()->flash('success', 'An email is sent to your email. Please verify your email');
        return redirect()->route('user.login');
      }
      else{
        session()->flash('error', 'Confirm password does not match');
        return back();
      }
    }


    public function verify($token)
    {
      $user = User::where('verify_token', $token)->update(['verify_token' => 1]);
      session()->flash('success', 'Account verified successfully');
      return redirect()->route('user.login');
    }

}
