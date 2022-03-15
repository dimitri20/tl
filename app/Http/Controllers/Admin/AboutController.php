<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $abouts = About::all();

        return view("admin.abouts.index")
                ->with("abouts", $abouts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.abouts.create");
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
            'language' => 'required',
            'content' => 'required'
        ]);


        About::create([
            'language' => $request->language,
            'content' => $request->content
        ]);

        return redirect()->route('admin.about.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $about = About::where('id', $id)->first();

        return view('admin.abouts.show')
                    ->with("about", $about);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $abouts = About::where('id', $id)->first();
        return view('admin.abouts.edit')
                ->with('abouts', $abouts);
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
        $request->validate([
            'language' => 'required',
            'content' => 'required'
        ]);

        About::where('id', $id)->update([
            'language' => $request->language,
            'content' => $request->content
        ]);

        return redirect()->route('admin.about.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        About::where('id', $id)->delete();
        redirect()->route('admin.abouts.index');
    }
}
