<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Contact;
use App\Models\Feedback;


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


        Feedback::create($request->all());


//        \Mail::send('mail', array(
//            'name' => $request->get('name'),
//            'email' => $request->get('email'),
//            'subject' => $request->get('subject'),
//            'user_query' => $request->get('message'),
//        ), function($message) use ($request){
//            $message->from($request->email);
//            $message->to('dito.gulua03@gmail.com', 'Admin')->subject($request->get('subject'));
//        });


        return back()->with('success', 'წერილი წარმატებით გაიგზავნა.');
    }
}
