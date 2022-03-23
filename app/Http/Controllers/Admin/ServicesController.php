<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Services;
use Illuminate\Http\Request;

class ServicesController extends Controller
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
        return view('admin.services.index')
                ->with('services', Services::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.services.create");
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
            'title_ka' => 'required',
            'title_en' => 'required',
            'title_ru' => 'required'
        ]);

        $image_name = uniqid().'_'.$request->file('image')->getClientOriginalName();
        $request->image->move(storage_path('app/public/service_images/'), $image_name);

        Services::create([
            'title_ka' => $request->title_ka,
            'title_en' => $request->title_en,
            'title_ru' => $request->title_ru,
            'image_path' => 'service_images/'.$image_name
        ]);

        return redirect()->route('admin.services.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = Services::where("id", $id)->first();

        return view("admin.services.show")
                    ->with("service", $service);
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
        $service = Services::where('id', $id);
        if(file_exists(storage_path('app/public/'.$service->first()->image_path))){
            unlink(storage_path('app/public/'.$service->first()->image_path));
        }

        $service->delete();
        return redirect()->route('admin.services.index');
    }
}
