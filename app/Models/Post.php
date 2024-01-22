<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $fillable = [
        'title',
        'content'
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            $post->slug = Str::slug($post->title);
        });
    }

    public function scopeActive($query)
    {
        return $query->where('active', true);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function totalComments()
    {
        return $this->comments()->count();
    }
}
