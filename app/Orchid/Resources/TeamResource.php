<?php

namespace App\Orchid\Resources;

use Orchid\Crud\Resource;
use Orchid\Screen\TD;
use Orchid\Screen\Sight;
use Orchid\Support\Facades\Layout;

use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Fields\Quill;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\Team;


class TeamResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = Team::class;

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            Input::make('name')
                ->required()
                ->title('Name')
                ->placeholder('Name'),

            Input::make('position')
                ->required()
                ->title('Position')
                ->placeholder('Position'),
            
            Quill::make('about')
                ->required()
                ->title('About')
                ->placeholder('About'),

            Cropper::make('image_path')
                ->required()
                ->targetRelativeUrl(),
                // ->width(400)
                // ->height(400)
    
        ];
    }

    /**
     * Get the columns displayed by the resource.
     *
     * @return TD[]
     */
    public function columns(): array
    {
        return [
            TD::make('name'),

            TD::make('image_path')->render(function($patient){
                $image = substr($patient->image_path, 1);
                return "<img src=\"$image\" style=\"width:200px; height:auto;\" alt=\"\">";
            }),

            TD::make('position'),

            // TD::make('created_at', 'Date of creation')
            //     ->render(function ($model) {
            //         return $model->created_at->toDateTimeString();
            //     }),

            // TD::make('updated_at', 'Update date')
            //     ->render(function ($model) {
            //         return $model->updated_at->toDateTimeString();
            //     }),
        ];
    }

    /**
     * Get the sights displayed by the resource.
     *
     * @return Sight[]
     */
    public function legend(): array
    {
        return [
            Sight::make('id'),
            Sight::make('image_path')->render(function($patient){
                $image = substr($patient->image_path, 1);
                return "<img src=\"$image\" style=\"width:300px; height:auto;\" alt=\"\">";
            }),
            Sight::make('name'),
            Sight::make('position'),
            Sight::make('about')->render(function($patient){
                return $patient->about;
            })
        ];
    }

    /**
     * Get the filters available for the resource.
     *
     * @return array
     */
    public function filters(): array
    {
        return [];
    }
}
