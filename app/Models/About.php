<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class About extends Model
{
    use HasFactory, AsSource, Filterable, Attachable;

    protected $table = 'about_us';

    protected $primaryKey = 'id';

    protected $fillable = [
        'language',
        'content'
    ];
}
