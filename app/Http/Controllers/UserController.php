<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use Image;

class UserController extends Controller
{
    public function index(Request $request)
    {
        return view('user.index', array('user' => Auth::user()));
    }

    public function update_avatar(Request $request)
    {
    	// Manejar la subida de usuario del avatar
    	if($request->hasFile('avatar')){
    		$avatar = $request->file('avatar');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );
    		$user = Auth::user();
    		$user->avatar = $filename;
    		$user->save();
    	}

    	return view('user.index', array('user' => Auth::user()) );
    }	
}
