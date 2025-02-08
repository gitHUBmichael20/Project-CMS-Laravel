<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    use HasFactory;

    protected $table = 'article';

    protected $fillable = [
        'title',
        'content',
        'author',
        'image',
        'admin_id',
    ];

    public $timestamps = true;

    public function getImageAttribute($value)
    {
        return asset('storage/' . $value);
    }

    // Relasi ke Admin
    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class);
    }
}
