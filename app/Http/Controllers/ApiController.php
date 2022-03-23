<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use App\Models\Post;

class ApiController extends Controller
{
    public function deleteFile(Request $request){

        // $this->middleware('auth');

        $path = $request->input('path');
        $request->validate(
            ['path' => 'required']
        );

        if($path === "" || $path === null){
            return response()->json("incorrect path", 400);
        }

        if(file_exists(storage_path('app/public/'.$path))){
            unlink(storage_path('app/public/'.$path));
            File::where('path', $path)->delete();
            return response()->json("file deleted", 200);
        } else {
            return response()->json("Not Found", 404);
        }

    }

    public function updatePostFileIds(Request $request){
        $id = $request->input('postId');
        $newData = $request->input('newData');
        $request->validate(
            ['postId' => 'required', 'newData' => 'required']
        );

        if($id === "" || $id === null){
            return response()->json("incorrect id", 400);
        }

        if($newData === "" || $newData === null){
            return response()->json('data field is null or empty', 400);
        }

        if($post = Post::findOrFail($id)){
            $post->files = $newData;
            $post->save();
            return response(200);
        } else {
            return response(404);
        }

    }
}
