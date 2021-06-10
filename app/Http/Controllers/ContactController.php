<?php

namespace App\Http\Controllers;

use App\Mail\FeedbackSendOnMail;
use Illuminate\Http\Request;

use App\Models\Contact;
use App\Models\Feedback;
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

        $details = [
            'title' => 'Mail from ItSolutionStuff.com',
            'body' => 'This is for testing email using smtp'
        ];

        Feedback::create($request->all());

        //Mail::to('dito.gulua03@gmail.com')->send(new FeedbackSendOnMail($request->all()));

        Mail::send('welcome', array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'subject' => $request->get('subject'),
            'user_query' => $request->get('message'),
        ), function($message) use ($request){
            $message->from($request->email);
            $message->to('dimitri.gulua@geolab.edu.ge', 'Admin')->subject($request->get('subject'));
        });

        return back()->with('success', 'წერილი წარმატებით გაიგზავნა.');
    }
}
