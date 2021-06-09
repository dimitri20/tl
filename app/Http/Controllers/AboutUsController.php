<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;
use App\Models\About;

class AboutUsController extends Controller
{
    public function index(){

        
        $about = About::where('language', App::currentLocale())->get();

        if($about->count() == 0){
            return view('about')
                    ->with('about', '');
        }
        else 
        {
            return view('about')
                    ->with('about', $about[0]['content']);
        }

        
    }
}
