<?php

namespace App\Orchid\Resources;

use Orchid\Crud\Resource;
use Orchid\Screen\TD;
use Orchid\Screen\Sight;

use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Cropper;



use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\Services;

class ServicesResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = Services::class;

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            Input::make('title_ka')
                ->required()
                ->title('Title (Georgian)')
                ->placeholder('Title'),

            Input::make('title_en')
                ->required()
                ->title('Title (English)')
                ->placeholder('Title'),

            Input::make('title_ru')
                ->required()
                ->title('Title (Russian)')
                ->placeholder('Title'),

            Cropper::make('image_path')
                ->required()
                ->width(400)
                ->height(400)
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

            TD::make('title_ka'),

            TD::make('image_path', 'Image')->render(function($patient){
                $image = $patient->image_path;
                return "<img src=\"$image\" style=\"width:200px; height:auto;\" alt=\"\">";
            }),

//            TD::make('created_at', 'Date of creation')
//                ->render(function ($model) {
//                    return $model->created_at->toDateTimeString();
//                }),
//
//            TD::make('updated_at', 'Update date')
//                ->render(function ($model) {
//                    return $model->updated_at->toDateTimeString();
//                }),
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
                $image = $patient['image_path'];
                return "<img src=\"$image\" style=\"width:300px; height:auto;\" alt=\"\">";
            }),
            Sight::make('title_ka'),
            Sight::make('title_en'),
            Sight::make('title_ru'),
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

    public function onSave(Request $request, Model $model)
    {
        $model->forceFill($request->all())->save();
    }

    public function onDelete(Model $model)
    {
        $model->delete();
    }
}
