<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'content',
        'thumb',
        'lid',
        'description',
        'keywords',
    ];

    protected static function boot() {
        parent::boot();
        
        static::creating(function ($blog) {
            $blog->slug = Str::slug($blog->name);
        });

        static::updating(function ($blog) {
            $blog->slug = Str::slug($blog->name);
        });
    }
}
