<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Storage;
use Str;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        $page = $request->page ?? 1;
        $limit = $request->limit ?? 4;
        $search = $request->search ?? '';
        $users = User::where('name', 'like', '%'.$search.'%')
            ->orWhere('username', 'like', '%'.$search.'%')
            ->orWhere('email', 'like', '%'.$search.'%')
            ->orderBy('created_at', 'desc')
            ->paginate($limit, ['*'], 'page', $page)
            ->withQueryString();
        // dd($users);
        return view('users.index', ['users' => $users]);
    }

    public function create()
    {
        return view('users.form');
    }

    public function edit($id)
    {
        $user = User::find($id);
        if(!$user){
            return redirect()->to('/admin/users')->with('error', 'User not found');
        }
        return view('users.form', ['user' => $user]);
    }

    public function store(Request $request, $id = null)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'nullable|min:6|confirmed',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        if($id){
            $user = User::find($id);
            if(!$user){
                return redirect()->to('/admin/users')->with('error', 'User not found');
            }
        }else{
            $user = new User();
        }

        try {
            $user->name = $request->name;
            $user->username = $request->username;
            $user->email = $request->email;
            if($request->password){
                $user->password = Hash::make($request->password);
            }

            if($request->hasFile('avatar')) {
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
                //avatar name will always be the same for the user, so this will replace the old avatar without having to delete the old avatar
                $avatar_name = $user->id_user . '_avatar.jpg';
                
                //resize the image to max 1024px keeping the aspect ratio using intervention image
                $image = \Image::read($avatar);
                $image->resize(1024, 1024, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                //save the image to the storage
                Storage::disk('public')->makeDirectory('avatar');
                Storage::disk('public')->put('avatar/'.$avatar_name, $image->toJpeg(80));
                $user->avatar = $avatar_name;
            }

            $user->save();
            return redirect()->to('/admin/users')->with('success', 'User saved successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

    }

    public function delete($id)
    {
        $user = User::find($id);
        if(!$user){
            return response()->json([
                'status' => 'error',
                'message' => 'User not found'
            ]);
        }
        $user->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'User deleted successfully'
        ]);
    }

}
