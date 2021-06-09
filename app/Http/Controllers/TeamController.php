<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use App\Models\Team;

class TeamController extends Controller
{
    public function index(){

        $team = Team::all()->toArray();
        $team_localized = array();
        $current_lang = App::currentLocale();

        for ($i=0; $i < sizeof($team) ; $i++) {
            $team_localized[$i] = [
                "id" => $team[$i]['id'],
                "name" => $team[$i]['name_'.$current_lang],
                "position" => $team[$i]['position_'.$current_lang],
                "about" => $team[$i]['about_'.$current_lang],
                "image_path" => $team[$i]['image_path'],
            ];
        }

        return view('team.index')
                        ->with('team', $team_localized);
    }

    public function show($language, $id){

        $teammate = Team::where('id', $id)->get();
        if($teammate->count() == 0){
            return abort(404);
        }
        else
        {
            $current_lang = App::currentLocale();
            $teammate_localized = [
                "name" => $teammate[0]["name_".$current_lang],
                "position" => $teammate[0]["position_".$current_lang],
                "about" => $teammate[0]["about_".$current_lang],
                "image_path" => $teammate[0]["image_path"],
                "id" => $teammate[0]["id"],
            ];
            return view('team.show')
                        ->with('teammate', $teammate_localized);
        }
    }
}
