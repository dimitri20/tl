<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC')->get()->toArray();
        $posts_localized = array();

        for ($i = 0; $i < sizeof($posts); $i++){
            $posts_localized[$i] = [
                "id" => $posts[$i]['id'],
                "slug" => $posts[$i]['slug_'.App::currentLocale()],
                "title" => $posts[$i]['title_'.App::currentLocale()],
                "image_path" => $posts[$i]["image_path"],
            ];
        }

        return view('blog.index')
            ->with('posts', $posts_localized);
    }

    public function show($lang, $id)
    {
        $post = Post::where('id', $id)->get()->toArray();

        if(sizeof($post) == 0)
        {

            return abort(404);

        }
        else
        {
            $posts_localized = array();

            $post_localized = [
                "id" => $post[0]['id'],
                "slug" => $post[0]['slug_'.App::currentLocale()],
                "title" => $post[0]['title_'.App::currentLocale()],
                "content" => $post[0]['content_'.App::currentLocale()],
                "image_path" => $post[0]["image_path"],
            ];

            return view('blog.show')
                        ->with('post', $post_localized);
        }

    }
}
