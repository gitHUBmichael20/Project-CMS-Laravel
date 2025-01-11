<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    protected $table = 'article'; // Nama tabel
    protected $fillable = [
        'title',
        'content',
        'image',
        'author',
    ];

    // Tambahkan format waktu untuk created_at
    protected $dates = ['created_at', 'updated_at'];
}

