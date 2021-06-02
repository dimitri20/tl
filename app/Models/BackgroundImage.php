<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class BackgroundImage extends Model
{
    use HasFactory, AsSource, Filterable, Attachable;

    protected $table = 'background_images';

    protected $primaryKey = 'id';

    protected $fillable = [
        'page_url',
        'image_path'
    ];
}