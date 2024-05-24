<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request){
        //validate the request
        $validation = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
            'remember_me' => 'nullable|boolean',
        ]);
        //check if validation fails
        if($validation->fails()){
            return response()->json([
                'status' => 'validation_error',
                'messages' => $validation->errors()->all()
            ]);
        }

        //attempt to authenticate the user
        if(auth()->attempt($request->only('username', 'password'), $request->remember_me)){
            $request->session()->regenerate();
            return response()->json([
                'status' => 'success',
                'message' => 'Login successful'
            ]);
        }else{
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid login credentials'
            ]);
        }
    }

    public function logout(Request $request){
        //logout the user
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
