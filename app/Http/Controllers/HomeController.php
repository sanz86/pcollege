<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Classes\Page;
use App\Classes\Contents as Ct;

use App\Content;

use App\User;
use Auth;
use Hash;
use App\Http\Requests;
use App\Http\Response;

class HomeController extends Controller
{
    public function index()
    {
        $pageDetails = new \stdClass();
        $pageDetails->title = 'dashboard';
        
        return view('home',['pageDetails' => $pageDetails]);
    }
   
   public function getError()
   {
       $pageDetails = new \stdClass();
        $pageDetails->title = 'error';
       return view('errors.404',['pageDetails' => $pageDetails]);
   }
   
       
    public function resetPassword(Request $request)
    {
    //     echo $request['old_password'];
    //   echo  $request['new_password'];
    //     die('here');
        $this->validate($request,[
            'new_password' => 'required|min:6',
            'old_password' => 'required|min:6',
            ]);
        
        //die(Auth::user());
        
        $user = User::where('username',Auth::user()->username)->first();
        
        if (Hash::check($request['old_password'], $user->password)) {
           
            $user->password = bcrypt($request['new_password']);
            $result = $user->save();
            
            if($result)
            return redirect()->back()->with(['success' => 'Password Changed Successfully']);
        } 
        
         return redirect()->back()->with(['fail' => 'Some thing Wrong happened. Failed to Change Password!!']);
        
    }
}
