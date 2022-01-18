<?php

namespace App\Orchid\Screens;

use App\Models\Post;
use Illuminate\Http\Request;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Upload;

class postScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'postScreen';

    /**
     * Display header description.
     *
     * @var string|null
     */
    public $description = 'postScreen';

    /**
     * Query data.
     *
     * @return array
     */
    public function query($id, Request $request): array
    {

        $post = Post::query()->where('id', $id)->first();
        $post->load("attachment");
        dd($post);
        return [
            'title_ka' => $post->title_ka,
            'slug_ka' => $post->slug_ka,
            'content_ka' => $post->content_ka,
            'title_en' => $post->title_en,
            'slug_en' => $post->slug_en,
            'content_en' => $post->content_en,
            'title_ru' => $post->title_ru,
            'slug_ru' => $post->slug_ru,
            'content_ru' => $post->content_ru,
            'image_path' => $post->image_path,
            'files' => $post->files,
        ];
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): array
    {
        return [];
    }



    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): array
    {
        return [
            Layout::rows([
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

            Upload::make('files')
                ->groups("files")
                ->maxFiles(10)
                ->parallelUploads(2)
            ])
        ];
    }
}
