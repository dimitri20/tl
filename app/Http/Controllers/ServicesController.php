<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use App\Models\Services;
use App\Models\Service;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Services::all()->toArray();
        $current_lang = App::currentLocale();
        $services_localized = [];

        for ($i = 0; $i < sizeof($services); $i++){
            $services_localized[$i] = [
                "title" => $services[$i]['title_'.$current_lang],
                "id" => $services[$i]['id'],
                "image_path" => $services[$i]['image_path'],
            ];
        }

        return view('services.index')
                    ->with('services', $services_localized);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($lang, $id)
    {

        $service_content = Service::where('services_id', $id)->get()->toarray();
        $services_list = Services::where('id', $id)->get();
        $service_name_localized = $services_list[0]['title_'.App::currentLocale()];
        $service_image = $services_list[0]['image_path'];



        if(sizeof($service_content) == 0)
        {

            return abort(400);

        }
        else
        {
            for ($i = 0; $i < sizeof($service_content); $i++)
            {
                $service_content_localized[$i] = [
                    "id" => $service_content[$i]['id'],
                    "content" => $service_content[$i]["content_".App::currentLocale()],
                ];
            }

            return view('services.show')
                ->with('service_contents', $service_content_localized)
                ->with('service_title', $service_name_localized)
                ->with('service_image', $service_image);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
