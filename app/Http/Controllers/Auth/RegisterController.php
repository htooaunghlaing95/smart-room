<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Attendance;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
            'student_id' => 'required|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'mac_address' => 'required',
            'desk_no' => 'required|integer',
            'state' => 'required|integer',
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
        Attendance::create([
           'time' => $data(['time']),
            'present' => $data (['present']),
        ]);

        return User::create([
            'name' => $data['name'],
            'student_id' => $data['student_id'],
            'password' => bcrypt($data['password']),
            'mac_address' => $data['mac_address'],
            'desk_no' => $data['desk_no'],
            'state' => $data['state'],
            'token' => $this->randomDigit(config('smartroom.token_length'), 1) [0]

        ]);
    }

    private function randomDigit($length, $count)
    {
        $codes = [];
        $stringDigits = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";

        while(count ($codes) < $count) {
            $randomString = '';
            for ($i = 0; $i < $length; $i++){
                $randomString = (string)$randomString . substr($stringDigits, rand(0, strlen($stringDigits)-1), 1);
            }
            if(!in_array($randomString, $codes)){
                $codes[] = (string)$randomString;
            }
        }

        return $codes;
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }
}
