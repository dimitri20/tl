<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class BackgroundImage extends Model
{
    use HasFactory;

    protected $table = 'background_images';

    protected $primaryKey = 'id';

    protected $fillable = [
        'page_url',
        'image_path'
    ];
}
