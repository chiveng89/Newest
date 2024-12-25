<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory;
    protected $table = 'advertisement';
    protected $primaryKey = 'advertisement';
    public $incrementing = false;
    protected $fillable = [
        'size',
        'category_id',
        'image',
        'status',
    ];
}
