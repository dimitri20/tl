<?php

declare(strict_types=1);

namespace App\Orchid\Screens;

use Orchid\Screen\Actions\Menu;

use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;

class PlatformScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Admin Panel';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = '';

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
            // Link::make('Website')
            //     ->href('http://orchid.software')
            //     ->icon('globe-alt'),

            // Link::make('Documentation')
            //     ->href('https://orchid.software/en/docs')
            //     ->icon('docs'),

            // Link::make('GitHub')
            //     ->href('https://github.com/orchidsoftware/platform')
            //     ->icon('social-github'),
        ];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]
     */
    public function layout(): array
    {
        return [
            // Layout::view('platform::partials.welcome'),
            Layout::rows([
                Link::make('Teams')
                    ->href('/admin/crud/list/team-resources'),
                
                Link::make('Service Content')
                    ->href('/admin/crud/list/services-content-resources'), 
                
                Link::make('Services')
                    ->href('/admin/crud/list/services-resources'),
                
                Link::make('Posts')
                    ->href('/admin/crud/list/post-resources'),
                
                Link::make('Background Images')
                    ->href('/admin/crud/list/background-images-resources'), 
                
                Link::make('Contacts')
                    ->href('/admin/crud/list/contact-resources'),
                
             ]),

        ];
    }
}
