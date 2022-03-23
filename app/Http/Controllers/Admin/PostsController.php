<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Post::all();

        return view("admin.posts.index")
                    ->with("posts", $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.posts.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request -> validate([
            'title_ka' => 'required',
            'title_en' => 'required',
            'title_ru' => 'required',
            'slug_ka' => 'required',
            'slug_en' => 'required',
            'slug_ru' => 'required',
            'image' => 'required'
        ]);

        $image_name = uniqid().'_'.$request->file('image')->getClientOriginalName();
        $request->image->move(storage_path('app/public/post_images/'), $image_name);

        $file_ids = [];

        if($files = $request->file('files')){
            for($i = 0; $i < sizeof($files); $i++){
                $filename = uniqid().'_'.$files[$i]->getClientOriginalName();
                $files[$i]->move(storage_path('app/public/files/'), $filename);
                File::create([
                    'title' => $files[$i]->getClientOriginalName(),
                    'path' => 'files/'.$filename
                ])->save();
                array_push($file_ids, DB::table("files")->orderByDesc('id')->first()->id);
            }
        }

        $files_json =  json_encode($file_ids);

        Post::create([
            'title_ka' => $request->title_ka,
            'title_en' => $request->title_en,
            'title_ru' => $request->title_ru,
            'slug_ka' => $request->slug_ka,
            'slug_en' => $request->slug_en,
            'slug_ru' => $request->slug_ru,
            'image_path' => 'post_images/'.$image_name,
            'files' => $files_json
        ]);


        return redirect()->route('admin.posts.index');

    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::where("id", $id)->first();
        $files = $this->getFiles($post->files);

        return view("admin.posts.show")
                    ->with("post", $post)
                    ->with('files', $files);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::where('id', $id)->first();
        $files = $this->getFiles($post->files);

        return view('admin.posts.edit')
                    ->with('post', $post)
                    ->with('files', $files);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request -> validate([
            'title_ka' => 'required',
            'title_en' => 'required',
            'title_ru' => 'required',
            'slug_ka' => 'required',
            'slug_en' => 'required',
            'slug_ru' => 'required'
        ]);

        $post = Post::where('id', $id);

        $imagePath = $post->first()->image_path;
        if($request->file('image')){
            $image_name = uniqid().'_'.$request->file('image')->getClientOriginalName();
            $request->image->move(storage_path('app/public/post_images/'), $image_name);
            $imagePath = 'post_images/'.$image_name;
        }

        $files_json = "[]";
        $file_ids = [];

        $filesIdDb = $this->getFiles($post->first()->files);
        foreach($filesIdDb as $file){
            array_push($file_ids, $file['id']);
        }
        $files_json = json_encode($file_ids);

        if($request->file('files')){

            if($files = $request->file('files')){
                for($i = 0; $i < sizeof($files); $i++){
                    $filename = uniqid().'_'.$files[$i]->getClientOriginalName();
                    $files[$i]->move(storage_path('app/public/files/'), $filename);
                    File::create([
                        'title' => $files[$i]->getClientOriginalName(),
                        'path' => 'files/'.$filename
                    ])->save();
                    array_push($file_ids, DB::table("files")->orderByDesc('id')->first()->id);
                }
            }

            $filesIdDb = $this->getFiles($post->first()->files);
            foreach($filesIdDb as $file){
                array_push($file_ids, $file['id']);
            }

            $files_json =  json_encode($file_ids);
        }


        $updatedData = [
            'title_ka' => $request->title_ka,
            'title_en' => $request->title_en,
            'title_ru' => $request->title_ru,
            'slug_ka' => $request->slug_ka,
            'slug_en' => $request->slug_en,
            'slug_ru' => $request->slug_ru,
            'content_ka' => $request->content_ka,
            'content_en' => $request->content_en,
            'content_ru' => $request->content_ru,
            'image_path' => $imagePath,
            'files' => $files_json
        ];

        $post->update($updatedData);
        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::where('id', $id);
        if(file_exists(storage_path('app/public/'.$post->first()->image_path))){
            unlink(storage_path('app/public/'.$post->first()->image_path));
        }


        if($files = $this->getFiles($post->first()->files)){
            if(sizeof($files) > 0){
                for($i = 0; $i < sizeof($files); $i++){
                    if(file_exists(storage_path('app/public/'.$files[$i]['path']))){
                        unlink(storage_path('app/public/'.$files[$i]['path']));
                    }
                }
            }
        }

        $post->delete();

        return redirect()->route("admin.posts.index");
    }



    public function getFiles($jsonData){
        $file_ids = json_decode($jsonData);
        $files_data = [];

        for($i = 0; $i < sizeof($file_ids); $i++){
            $file = File::where('id', $file_ids[$i])->first();
            if($file !== null){
                $tmpArr = [
                    "id" => $file->id,
                    "title" => $file->title,
                    "path" => $file->path
                ];
                array_push($files_data, $tmpArr);
            }
        }

        return $files_data;
    }
}
