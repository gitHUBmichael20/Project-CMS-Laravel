<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $table = 'admins';
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    // Relasi ke Article
    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }
}
