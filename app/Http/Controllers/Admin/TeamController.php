<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Team;

class TeamController extends Controller
{/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.team.index")
                    ->with("teams", Team::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.team.create");
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
            'name_ka' => 'required',
            'position_ka' => 'required',
            'about_ka' => 'required',
            'name_en' => 'required',
            'position_en' => 'required',
            'about_en' => 'required',
            'name_ru' => 'required',
            'position_ru' => 'required',
            'about_ru' => 'required',
            'image' => 'required'
        ]);

        $image_name = uniqid().'_'.$request->file('image')->getClientOriginalName();
        $request->image->move(storage_path('app/public/service_images/'), $image_name);

        Team::create([
            'name_ka' => $request->name_ka,
            'position_ka' => $request->position_ka,
            'about_ka' => $request->about_ka,
            'name_en' => $request->name_en,
            'position_en' => $request->position_en,
            'about_en' => $request->about_en,
            'name_ru' => $request->name_ru,
            'position_ru' => $request->position_ru,
            'about_ru' => $request->about_ru,
            'image_path' => 'team_images/'.$image_name
        ]);

        return redirect()->route('admin.team.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view("admin.team.show")
                    ->with("team", Team::where("id", $id)->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.team.edit')
                    ->with('team', Team::where('id', $id)->first());
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
            'name_ka' => 'required',
            'position_ka' => 'required',
            'about_ka' => 'required',
            'name_en' => 'required',
            'position_en' => 'required',
            'about_en' => 'required',
            'name_ru' => 'required',
            'position_ru' => 'required',
            'about_ru' => 'required'
        ]);

        $team = Team::where('id', $id);

        $imagePath = $team->first()->image_path;
        if($request->file('image')){
            $image_name = uniqid().'_'.$request->file('image')->getClientOriginalName();
            $request->image->move(storage_path('app/public/team_images/'), $image_name);
            $imagePath = 'team_images/'.$image_name;
        }

        $updatedData = [
            'name_ka' => $request->name_ka,
            'position_ka' => $request->position_ka,
            'about_ka' => $request->about_ka,
            'name_en' => $request->name_en,
            'position_en' => $request->position_en,
            'about_en' => $request->about_en,
            'name_ru' => $request->name_ru,
            'position_ru' => $request->position_ru,
            'about_ru' => $request->about_ru,
            'image_path' => $imagePath
        ];

        $team->update($updatedData);

        return redirect()->route('admin.team.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $team = Team::where('id', $id);
        if(file_exists(storage_path('app/public/'.$team->first()->image_path))){
            unlink(storage_path('app/public/'.$team->first()->image_path));
        }

        $team->delete();
        return redirect()->route('admin.team.index');
    }
}
