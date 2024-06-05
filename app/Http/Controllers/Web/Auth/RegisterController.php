<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Validator;

class RegisterController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:user',
            'password' => 'required|string|min:8|confirmed',
        ],[],[
            'name' => 'Display name', //change the attribute name from 'name' to 'Display name' in the error message
        ]);
        //check if validation fails
        if ($validation->fails()) {
            return response()->json([
                'status' => 'validation_error',
                'messages' => $validation->errors()->all()
            ]);
        }

        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        //send email verification link
        //$user->sendEmailVerificationNotification();

        return response()->json(['status' => 'success', 'message' => 'Account created successfully. Please check your email for verification link.'], 201);

    }
}
