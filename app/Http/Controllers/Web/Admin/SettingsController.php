<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller
{
    public function index()
    {
        return view('settings.index');
    }

    public function change_password(Request $request){
        //validate the request
        $validation = Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);
        //check if validation fails
        if($validation->fails()){
            return response()->json([
                'status' => 'validation_error',
                'messages' => $validation->errors()->all()
            ]);
        }

        $user = Auth::user();
        //check if the current password is correct
        if(Hash::check($request->current_password, $user->password) === false){
            return response()->json([
                'status' => 'error',
                'message' => 'Current password is incorrect'
            ]);
        }

        //update the user's password
        $user->password = Hash::make($request->new_password);
        $user->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Password changed successfully'
        ]);
    }
}
