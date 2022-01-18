<?php

namespace App\Http\Controllers;

use App\Mail\feedback;
use Illuminate\Http\Request;

use App\Models\Contact;
use Illuminate\Support\Facades\Mail;



class ContactController extends Controller
{
    public function index(){

        $contact_info = array();
        foreach(Contact::all() as $thing){
            $contact_info[$thing['contact_name']] = $thing['contact_info'];
        }

        return view('contact')
            ->with('contact_info', $contact_info);
    }

    public function store(Request $request){
        // Form validation
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'subject'=>'required',
            'message' => 'required',
        ]);

        $feedback = [
            "name" => $request->name,
            "email" => $request->email,
            "subject" => $request->subject,
            "message" => $request->message
        ];

        Mail::to($request->email)->send(new feedback($feedback));

        return back()->with('success', 'წერილი წარმატებით გაიგზავნა.');
    }
}
