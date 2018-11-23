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

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Model\Category')->withDefault([
            'name' => '未分類',
        ]);
    }

    public function tags()
    {
        return $this->belongsToMany('App\Model\Tag')->withTimestamps();
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published')->where('published_at', '<=', Carbon::now());
    }
}
