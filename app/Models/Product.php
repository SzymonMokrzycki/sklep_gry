<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'title1',
        'category',
        'count',
        'price',
        'publisher',
        'platform',
        'year',
        'user',
        'image',
        'desc'
    ];
    protected $d = 'created_at';
    
}
