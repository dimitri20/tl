<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BackgroundImage;
use Illuminate\Http\Request;

class BackgroundImagesController extends Controller
{

/**
     * Create a new controller instance.
     *
     * @return void
     */
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

        $images = BackgroundImage::all();

        return view("admin.backgroundImages.index")
                    ->with("images", $images);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.backgroundImages.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required',
            'page_url' => 'required'
        ]);

        $image_name = uniqid().'_'.$request->file('image')->getClientOriginalName();
        $request->image->move(storage_path('app/public/background_images/'), $image_name);

        BackgroundImage::create([
            'page_url' => $request->page_url,
            'image_path' => 'background_images/'.$image_name
        ]);

        return redirect()->route('admin.backgroundImages.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $image = BackgroundImage::where("id", $id)->first();

        return view("admin.backgroundImages.show")
                    ->with("image", $image);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return abort(404);
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
        return abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = BackgroundImage::where('id', $id);
        if(file_exists(storage_path('app/public/'.$post->first()->image_path))){
            unlink(storage_path('app/public/'.$post->first()->image_path));
        }

        $post->delete();
        return redirect()->route('admin.backgroundImages.index');
    }
}
