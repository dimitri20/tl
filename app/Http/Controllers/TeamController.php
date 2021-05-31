<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class TeamController extends Controller
{
    public function index(){

        $team = Team::all();

        return view('team.index')
                        ->with('team', $team);
    }

    public function show($id){

        $teammate = Team::where('id', $id)->get()[0];

        return view('team.show')
                        ->with('teammate', $teammate);
    }
}
