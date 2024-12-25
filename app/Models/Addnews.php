<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addnews extends Model
{
    use HasFactory;
    protected $table = 'addnews';

    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'short_description',
        'long_description',
        'image_position',
        'image',
        'add_to_slide',
        'add_to_home',
        'add_to_related_views',
        'add_to_most_views',
    ];

}
