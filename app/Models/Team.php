<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Team extends Model
{
    use HasFactory;

    protected $table = 'teams';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name_ka',
        'position_ka',
        'about_ka',
        'name_en',
        'position_en',
        'about_en',
        'name_ru',
        'position_ru',
        'about_ru',
        'image_path'
    ];

}
