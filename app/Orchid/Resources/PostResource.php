<?php

namespace App\Orchid\Resources;


use Orchid\Crud\Resource;
use Orchid\Screen\TD;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Sight;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class PostResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = Post::class;

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

            TextArea::make('slug_ka')
                ->required()
                ->title('Slug (Georgian)')
                ->rows(3)
                ->maxlength(100)
                ->placeholder('Post description for preview'),

            Quill::make('content_ka')
                ->required()
                ->title('Content (Georgian)')
                ->placeholder('Post Content'),

            Input::make('title_en')
                ->required()
                ->title('Title (English)')
                ->placeholder('Title'),

            TextArea::make('slug_en')
                ->required()
                ->title('Slug (English)')
                ->rows(3)
                ->maxlength(100)
                ->placeholder('Post description for preview'),

            Quill::make('content_en')
                ->required()
                ->title('Content (English)')
                ->placeholder('Post Content'),

            Input::make('title_ru')
                ->required()
                ->title('Title (Russian)')
                ->placeholder('Title'),

            TextArea::make('slug_ru')
                ->required()
                ->title('Slug (Russian)')
                ->rows(3)
                ->maxlength(100)
                ->placeholder('Post description for preview'),

            Quill::make('content_ru')
                ->required()
                ->title('Content (Russian)')
                ->placeholder('Post Content'),

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

            TD::make('image_path', "Image")->render(function($patient){
                $image = $patient['image_path'];
                return "<img src=\"$image\" style=\"width:200px; height:auto;\" alt=\"\">";
            }),

            TD::make('title_ka'),

            TD::make('slug_ka'),

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
            Sight::make('id'),
            Sight::make('image_path')->render(function($patient){
                $image = $patient['image_path'];
                return "<img src=\"$image\" style=\"width:300px; height:auto;\" alt=\"\">";
            }),
            Sight::make('title_ka'),
            Sight::make('slug_ka'),
            Sight::make('content_ka')->render(function($content){
                return html_entity_decode($content['content_ka']);
            }),
            Sight::make('title_en'),
            Sight::make('slug_en'),
            Sight::make('content_en')->render(function($content){
                return html_entity_decode($content['content_en']);
            }),
            Sight::make('title_ru'),
            Sight::make('slug_ru'),
            Sight::make('content_ru')->render(function($content){
                return html_entity_decode($content['content_ru']);
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

        /**
     * Get the resource should be displayed in the navigation
     *
     * @return bool
     */
    public static function displayInNavigation(): bool
    {
        return true;
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
