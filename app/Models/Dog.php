<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'name', 'breed', 'age', 'color', 'weight', 'description', 'photo','community_id', 'sexo',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function community()
    {
        return $this->belongsTo(Community::class);
    }

    public function communities()
    {
        return $this->belongsToMany(Community::class, 'community_dog');
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
