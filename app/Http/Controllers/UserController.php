<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Attendance;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    //This API is for User Registration.
    public function apiRegister(Request $request)
    {
        $name = $request->input('name');
        $student_id = $request->input('student_id');
        $password = $request->input('password');
        $mac_address = $request->input('mac_address');
        $serial_no = $request->input('serial_no');
        $desk_no = $request->input('desk_no');
        $state = $request->input('state');
        $user_id = $request->input('user_id');
        $time = $request->input('time');
        $present = $request->input('present');

        $user = User::create([
            'name' => $name,
            'student_id' => $student_id,
            'password' => bcrypt($password),
            'mac_address' => $mac_address,
            'serial_no' => $serial_no,
            'desk_no' => $desk_no,
            'state' => $state,
            'token' => $this->randomDigit(config('smartroom.token_length'), 1) [0]
        ]);

        $attendance = Attendance::create([
            'user_id' => $user->id,
            'time' => $time,
            'present' => $present,
        ]);

        return response()->json([
            'status' => 'Ok',
            'message' => 'Register Success',
            'auth_token' => $user->token,
            'user' => $user->name
        ], 200);

    }

    //This API is for UserLogin
    public function apiLogin(Request $request)
    {
        $student_id = $request->input('student_id');
        $password = $request->input('password');

        $user = User::where('student_id', $student_id)->first();
        if ($user && Hash::check($password, $user->password)) {

            if ($user->token == null && $user->token == '') {
                $token = $this->randomDigit(config('smartroom.token_length'), 1) [0];
                $user->token = $token;
                $user->save();
            }

            return response()->json([
                'status' => 'OK',
                'message' => 'Login Success',
                'auth_token' => $user->token,
                'user' => $user->name
            ]);
        } else {
            return response()->json([
                'status' => 'Fail',
                'message' => 'Login Fail'
            ]);
        }
    }

    //This API is for logging out the user
    public function apiLogout(Request $request)
    {
        $user = User::where('token', $request->input('token'))->first();

        if ($user) {

            $user->token = null;
            $user->save();

            return response()->json([
                'status' => 'Ok',
                'message' => 'Logout Success',
                'user' => $user->name
            ]);
        }

        return response()->json([
            'status' => 'Fail',
            'message' => 'Logout Fail'
        ]);
    }

    // This API is to show the single user by using id.
    public function apiUserShow($id, Request $request)
    {
        $tokenuser = User::with('attendance')->where('token', $request->input('token'))->first();
        $user = User::with('attendance')->find($id);

        if ($user && $tokenuser == $user) {
            return response()->json([
                'id'=>$user->id,
                'name'=>$user->name,
                'studentID'=>$user->student_id,
                'macAddress'=>$user->mac_address,
                'serialNo'=>$user->serial_no,
                'deskNo'=>$user->desk_no,
                'state'=>$user->state,
                'time'=>$user->attendance->time,
                'present'=>$user->attendance->present
            ]);
        }

        return response()->json([
            'status' => 'Fail',
            'message' => 'You dont have access to see this user.'
        ]);
    }

    //List all the users in the database
    public function apiUsers()
    {
        $users = User::Paginate(5);

        return response()->json([
            'id'=>$users->id,
            'name'=>$users->name,
            'studentID'=>$users->student_id,
            'macAddress'=>$users->mac_address,
            'serialNo'=>$users->serial_no,
            'deskNo'=>$users->desk_no,
            'state'=>$users->state,
            'time' =>$users->attendance->time,
            'present' =>$users->attendance->present
        ]);
    }

    //This function is to generate the token.
    private function randomDigit($length, $count)
    {
        $codes = [];
        $stringDigits = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";

        while (count($codes) < $count) {
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString = (string)$randomString . substr($stringDigits, rand(0, strlen($stringDigits) - 1), 1);
            }
            if (!in_array($randomString, $codes)) {
                $codes[] = (string)$randomString;
            }
        }

        return $codes;
    }
}
