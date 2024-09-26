<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\message;
use App\Models\newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class contactController extends Controller
{
    public function showContact(){
        return view('user.contact.contact');
    }

    public function sendMessage(Request $r)
        {
            $r->validate([
                'email' => 'required|email|max:190',
                'name' => 'required|string|max:190',
                'subject' => 'nullable|string|max:190',
                'message' => 'required|string',
            ]);
            $data=$r->all();
            $data['user_id'] = Auth::user()->id;
            message::create($data);
            return redirect()->back()->with('success','success send message');
        }

    public function newsletter(Request $r)
        {
            $r->validate([
                'email' => 'required|email|max:190',
            ]);
            $data=$r->all();
            newsletter::create($data);
            return redirect()->back()->with('successNewsletter','success send email');
        }

}
