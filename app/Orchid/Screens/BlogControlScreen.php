<?php

namespace App\Orchid\Screens;

use Orchid\Screen\Screen;

use App\Models\User;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Relation;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Actions\Button;

class BlogControlScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'BlogControlScreen';

    /**
     * Display header description.
     *
     * @var string|null
     */
    public $description = 'Tool to control blog';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [];
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): array
    {
        return [
            
        ];
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
            ])
        ];
    }
}
