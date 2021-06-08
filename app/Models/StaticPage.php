<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class StaticPage extends Model
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
        'position',
    ];

    protected static function boot() {
        parent::boot();

        static::creating(function ($static_page) {

            $position = 1;
            $latestOrder = static::orderBy('position','DESC')->first();
            if($latestOrder){
                $position = $latestOrder->position + 1;
            }

            $static_page->slug = Str::slug($static_page->name);
            $static_page->position = $position;
        });

        static::updating(function ($static_page) {
            $static_page->slug = Str::slug($static_page->name);
        });
    }
}
