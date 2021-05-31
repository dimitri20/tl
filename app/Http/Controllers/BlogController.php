<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class BlogController extends Controller
{
    public function index()
    {   
        return view('blog.index')
            ->with('posts', Post::orderBy('updated_at', 'DESC')->get());
    }

    public function show($id)
    {
        $post = Post::where('id', $id)->get();

        if($post->count() == 0)
        {

            return abort(404);

        } 
        else 
        {
            return view('blog.show')
                        ->with('post', $post[0]);
        }

    }
}
