<?php

namespace App\Orchid\Resources;

use Orchid\Crud\Resource;
use Orchid\Screen\TD;
use Orchid\Screen\Sight;

use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Relation;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\Service;
use App\Models\Services;

class ServicesContentResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = Service::class;

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            TextArea::make('content_ka')
                ->required()
                ->rows(10)
                ->title('Content (Georgian)'),

            TextArea::make('content_en')
                ->required()
                ->rows(10)
                ->title('Content (English)'),

            TextArea::make('content_ru')
                ->required()
                ->rows(10)
                ->title('Content (Russian)'),

            Relation::make('services_id')
                ->required()
                ->fromModel(Services::class, 'title_ka')
                ->title('Choose Service')
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

            TD::make('content', "Service Title")->render(function($data){
               $service = Services::where('id', $data['services_id'])->get()->toArray();
               return $service[0]['title_ka'];
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
            Sight::make('content', "Service Title")->render(function($data){
                $service = Services::where('id', $data['services_id'])->get()->toArray();
                return $service[0]['title_ka'];
            }),
            Sight::make('content_ka'),
            Sight::make('content_en'),
            Sight::make('content_ru'),
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
