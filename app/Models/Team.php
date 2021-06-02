<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Team extends Model
{
    use HasFactory, AsSource, Filterable, Attachable;

    protected $table = 'teams';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'position',
        'about',
        'image_path'
    ];

}
