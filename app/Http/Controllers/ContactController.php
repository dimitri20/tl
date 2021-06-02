<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Contact;

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
}
