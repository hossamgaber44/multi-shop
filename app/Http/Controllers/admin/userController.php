<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function index(){
        $data['users']=User::all();
            return view('admin.users.index')->with($data);
    }

    public function delete($id){

        User::findOrFail($id)->delete();
        return back();
    }

}
