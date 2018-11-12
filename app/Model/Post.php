<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    protected $dates = ['published_at'];
    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'slug',
        'body',
        'thumbnail',
        'status',
        'meta_description',
        'head_html',
        'footer_html',
        'canonical',
        'published_at',
    ];

    public function scopePublished($query)
    {
        return $query->where('status', 'published')->where('published_at', '<=', Carbon::now());
    }
}
