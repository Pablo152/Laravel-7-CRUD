<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMailable;

class SendEmailController extends Controller
{
    //
    function index()
    {
        return view('send_email');
    }

    function send(Request $request) {
        $this->validate($request, [
           'email' => 'required|email',
        ]);


        Mail::to($request)->send(new TestMailable());
        return back()->with('success', 'Thanks!');

    }
}
