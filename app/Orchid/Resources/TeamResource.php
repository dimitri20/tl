<?php

namespace App\Orchid\Resources;

use Orchid\Crud\Resource;
use Orchid\Screen\TD;
use Orchid\Screen\Sight;
use Orchid\Support\Facades\Layout;

use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Select;

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
    public function fields():array
    {
        return [
                //    georgian
            Input::make('name_ka')
                ->required()
                ->title('Name (Georgian)')
                ->placeholder('Name'),

            Input::make('position_ka')
                ->required()
                ->title('Position (Georgian)')
                ->placeholder('Position'),

            Quill::make('about_ka')
                ->required()
                ->title('About (Georgian)')
                ->placeholder('About'),

                // english
            Input::make('name_en')
                ->required()
                ->title('Name (English)')
                ->placeholder('Name'),

            Input::make('position_en')
                ->required()
                ->title('Position (English)')
                ->placeholder('Position'),

            Quill::make('about_en')
                ->required()
                ->title('About (English)')
                ->placeholder('About'),

            // russian
            Input::make('name_ru')
                ->required()
                ->title('Name (Russian)')
                ->placeholder('Name'),

            Input::make('position_ru')
                ->required()
                ->title('Position (Russian)')
                ->placeholder('Position'),

            Quill::make('about_ru')
                ->required()
                ->title('About (Russian)')
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
            TD::make('image_path')->render(function($patient){
                $image = $patient->image_path;
                return "<img src=\"$image\" style=\"width:200px; height:auto;\" alt=\"\">";
            }),

            TD::make('name_ka'),

            TD::make('position_ka'),

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
                $image = $patient->image_path;
                return "<img src=\"$image\" style=\"width:300px; height:auto;\" alt=\"\">";
            }),
            Sight::make('name_ka'),
            Sight::make('position_ka'),
            Sight::make('about_ka')->render(function($patient){
                return html_entity_decode($patient['about_ka']);
            }),
            Sight::make('name_en'),
            Sight::make('position_en'),
            Sight::make('about_en')->render(function($patient){
                return html_entity_decode($patient['about_en']);
            }),
            Sight::make('name_ru'),
            Sight::make('position_ru'),
            Sight::make('about_ru')->render(function($patient){
                return html_entity_decode($patient['about_ru']);
            }),
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
