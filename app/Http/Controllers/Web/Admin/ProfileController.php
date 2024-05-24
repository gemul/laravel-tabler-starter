<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Laravel\Facades\Image;
use Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $data = [
            'user' => $user,
            'avatar_url' => $user->avatar? url('storage/avatar/'.$user->avatar): "https://api.dicebear.com/8.x/bottts/svg?seed=".$user->username,
        ];
        return view('profile.index', $data);
    }

    public function update(Request $request){
        $user = Auth::user();
        //validate the request
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required|unique:user,username,'.$user->id_user.',id_user',
            'email' => 'required|email',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
        ]); 

        //check if validation fails
        if($validation->fails()){
            return response()->json([
                'status' => 'validation_error',
                'messages' => $validation->errors()->all()
            ]);
        }

        try {
            DB::beginTransaction();
            //update the user's profile
            $user->name = $request->name;
            $user->username = $request->username;
            $user->email = $request->email;
            if($request->hasFile('avatar')){
                $avatar = $request->file('avatar');
                /**
                 * Note:
                 * for best security practice (e.g. preventing someone uploading a php shell), never use the uploaded file name AND extension. 
                 * Generate a new, standarized name and explicitly set the extension to jpg or png if you are expecting an image.
                 * never use an unsecured method like ->getClientOriginalExtension() to get the extension. 
                 * better use a predefined array of allowed extensions and set it explicitly.
                 * If you are expecting an image, you can use the intervention image library to resize the image and save it to the storage.
                 * This way, you can prevent someone uploading a php shell or any other malicious file.
                 */
                $avatar_name = $user->id_user . '_avatar.jpg'; 
                //resize the image to max 1024px keeping the aspect ratio using intervention image
                $image = Image::read($avatar);
                $image->resize(1024, 1024, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                //save the image to the storage
                Storage::disk('public')->makeDirectory('avatar');
                $image->save(storage_path('app/public/avatar/'.$avatar_name));
                $user->avatar = $avatar_name;
            }
            $user->save();
            DB::commit();
            return response()->json([
                'status' => 'success',
                'message' => 'Profile updated successfully'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while updating the profile' . $e->getMessage()
            ]);
        }

    }
}
