<?php

namespace App\Orchid\Resources;

use Orchid\Crud\Resource;
use Orchid\Screen\TD;

use Orchid\Screen\Sight;

use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Picture;



use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\BackgroundImage;

class BackgroundImagesResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = BackgroundImage::class;

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            Input::make('page_url')
                ->required()
                ->title('Page URL')
                ->placeholder('Enter Page Relative Url'),

            Picture::make('image_path')
                ->required()
                ->targetRelativeUrl(),
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
            TD::make('id'),
            TD::make('image_path')->render(function($patient){
                $image = substr($patient->image_path, 1);
                return "<img src=\"$image\" style=\"width:300px; height:auto;\" alt=\"\">";
            }),
            TD::make('page_url'),
            TD::make('image_path'),
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
            Sight::make('page_url'),
            Sight::make('image_path')->render(function($patient){
                $image = substr($patient->image_path, 1);
                return "<img src=\"$image\" style=\"width:300px; height:auto;\" alt=\"\">";
            }),
            Sight::make('image_path')
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
