<?php

namespace App\Orchid\Resources;

use Orchid\Crud\Resource;
use Orchid\Screen\TD;
use Orchid\Actions\PostAction;

use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Upload;

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
            Input::make('post.title')
            ->required()
            ->title('Title')
            ->placeholder('Title'),

            Input::make('post.image')
                ->type('file')
                ->required()
                ->title('Image'),

            TextArea::make('post.description')
                ->required()
                ->title('Slug')
                ->rows(3)
                ->maxlength(100)
                ->placeholder('Post description for preview'),

            Quill::make('post.body')
                ->required()
                ->title('Content')
                ->placeholder('Post Content'),
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

            TD::make('post.title'),

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
            Sight::make('title'),
        ];
    }

        /**
     * Get the validation rules that apply to save/update.
     *
     * @return array
     */
    // public function rules(Model $model): array
    // {
    //     return [
    //         'slug' => [
    //             'required',
    //             Rule::unique(self::$model, 'slug')->ignore($model),
    //         ],
    //     ];
    // }

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

        /**
     * Get the actions available for the resource.
     *
     * @return array
     */
    // public function actions(): array
    // {
    //     return [
    //         PostAction::class,
    //     ];
    // }
}
