<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class VarificationController extends Controller
{
   public function verify($token){
       $user = User::where('remember_token',$token)->first();
       if (!is_null($user)){
           $user->status = 1;
           $user->remember_token = NULL;
           $user->save();
           session()->flash('success','You Are registered Successfully !! Login Now');
           return redirect('login');
       }else{
           session()->flash('errors','Sorry !! Your token not mathced !!');
           return redirect('/');
       }

   }
}
