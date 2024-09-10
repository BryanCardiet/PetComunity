<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Blog;

class Community extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function dogs()
    {
        return $this->hasMany(Dog::class);
    }
    public function dog()
    {
        return $this->belongsToMany(Dog::class, 'community_dog');
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }
}
