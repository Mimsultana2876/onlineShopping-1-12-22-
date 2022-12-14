<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $user = user::get();
        return view('admin.user.index',compact('user'));
    }
    public function delete( $id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('message','delete');
     
     }
}
