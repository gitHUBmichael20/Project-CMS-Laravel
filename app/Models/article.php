<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    protected $table = 'article';

    protected $fillable = [
        'title',
        'content',
        'author',
        'image',
    ];

    public $timestamps = true;

    public function getImageAttribute($value)
    {
        return asset('storage/' . $value); // Generates the full URL to access the image
    }
}
