<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Services extends Model
{
    use HasFactory;

    protected $table = 'services';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title_ka',
        'title_en',
        'title_ru',
        'image_path'
    ];




}
