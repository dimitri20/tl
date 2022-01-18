<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Post extends Model
{
    use HasFactory, AsSource, Filterable, Attachable;


    protected $table = 'posts';

    protected $primaryKey = 'id';

    protected $fillable = [
        'slug_ka',
        'title_ka',
        'content_ka',
        'slug_en',
        'title_en',
        'content_en',
        'slug_ru',
        'title_ru',
        'content_ru',
        'image_path',
        'files'
    ];
}
