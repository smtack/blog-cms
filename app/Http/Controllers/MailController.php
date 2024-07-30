<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class MailController extends Controller
{
    public function __invoke(Request $request)
    {
        if($this->sendMail($request)) {
            return back()->with('message', 'Thank you for your message');
        } else {
            return back()->with('message', 'Unable to send email at this time. Please try again later');
        }
    }

    protected function sendMail(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:2|max:255',
            'email' => 'required|email',
            'subject' => 'required|min:2|max:255',
            'message' => 'required|min:10|max:5000'
        ]);

        if(Mail::to('admin@example.com')->send(new ContactMail($validated))) {
            return true;
        }

        return false;
    }
}
