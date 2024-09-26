<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function login(){
            return view('admin.login');
        }

        public function dologin(Request $r){
            $data =$r->validate([
                'email'=>'required|email|max:190',
                'password' => 'required|string'
            ]);
          if(auth()->guard('admin')->attempt(['email'=>$data['email'],'password' =>$data['password']]))
          {
            return redirect(route('admin.users'));
          }
          else
          {
            return back()->with($data);
          }
        }
}
