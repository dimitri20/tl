<?php

namespace App\Orchid\Resources;

use Orchid\Crud\Resource;
use Orchid\Screen\TD;
use Orchid\Screen\Sight;

use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Select;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\About;

class AboutResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = About::class;

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            Select::make('language')
                ->required()
                ->options([
                    'ka'   => 'ka',
                    'en' => 'en',
                    'ru' => 'ru'
                ])
                ->title('Select language'),

            Quill::make('content')
                ->required()
                ->title('Content')
                ->placeholder('Content'),
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

            TD::make('language'),

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
            Sight::make('language'),
            Sight::make('content')->render(function($content){
                return html_entity_decode($content['content']);
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
