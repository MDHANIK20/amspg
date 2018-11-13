<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\verifyEmail;
use Session;

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
    protected $redirectTo = '/home';

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
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        Session::flash('status','Registered! But not verified by manager  yet. Please Wait for activation');
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'verifyToken'=> Str::random(40),
            'password' => Hash::make($data['password']),
            
        ]);
            
        
        $thisUser = User::findOrfail($user->id);
        $this->sendMail($thisUser);
        return $user;
    }

    public function sendMail($thisUser){
        Mail::to($thisUser['email'])->send(new verifyEmail($thisUser));
    }
    
    public function SendEmailDone($email, $verifyToken){
        $user = User::where(['email'=>$email, 'verifyToken'=>$verifyToken])->first();
        if($user){
           return user::where(['email'=>$email, 'verifyToken'=>$verifyToken])->update(['status'=>'1', 'verifyToken'=>NULL]);
        }
        else{

        }

    }
    public function verifyEmailFirst(){
        return view('email/verifyEmailFirst'); 
    }
}
