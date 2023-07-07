<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    // table
    protected $table = 'posts';
    // fillable
    protected $fillable = [
        'title',
        'body',
        'slug',
        'user_id',
    ];

}
