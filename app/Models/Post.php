<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'dog_id',
        'community_id',
        'title',
        'content',
        'image',
    ];

    public function community()
    {
        return $this->belongsTo(Community::class);
    }

    public function dog()
    {
        return $this->belongsTo(Dog::class);
    }

}
