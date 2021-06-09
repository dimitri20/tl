<?php

namespace App\Orchid\Resources;

use Orchid\Crud\Resource;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\TD;
use Orchid\Screen\Sight;

use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\TextArea;


use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\Contact;

class ContactResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = Contact::class;

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
                ->title('Select language (Select ka if there are no other translations for this text)'),
//
//            Input::make('contact_name')
//                ->required()
//                ->title('Contact Name ')
//                ->placeholder('Contact Name'),

            Select::make('language')
                ->required()
                ->options([
                    'mail'   => 'mail',
                    'phone' => 'phone',
                    'physical_address_ka' => 'physical_address_ka',
                    'physical_address_en' => 'physical_address_en',
                    'physical_address_ru' => 'physical_address_ru',
                ])
                ->title('Select Contact info'),

            Textarea::make('contact_info')
                ->required()
                ->title('Contact Info')
                ->rows(2),
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

            TD::make('contact_name'),

            TD::make('contact_info'),


            TD::make('created_at', 'Date of creation')
                ->render(function ($model) {
                    return $model->created_at->toDateTimeString();
                }),

            TD::make('updated_at', 'Update date')
                ->render(function ($model) {
                    return $model->updated_at->toDateTimeString();
                }),
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
            Sight::make('contact_name'),
            Sight::make('contact_info')
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
