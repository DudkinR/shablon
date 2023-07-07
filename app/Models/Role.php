<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    // table
    protected $table = 'roles';
    // fillable
    protected $fillable = [
        'slug'
    ];
    // timestamps
    public $timestamps = false;
    // relationship
    public function users()
    {
        return $this->belongsToMany(User::class,'user_role','role_id','user_id');
    }
}
