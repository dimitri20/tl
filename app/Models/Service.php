<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Service extends Model
{
    use HasFactory;

    protected $table = 'services_content';

    protected $primaryKey = 'id';

    protected $fillable = [
        'content_ka',
        'content_en',
        'content_ru',
        'services_id'
    ];

}
