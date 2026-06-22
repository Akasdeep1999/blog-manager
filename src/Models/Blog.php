<?php

namespace Mycompany\BlogManager\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blogs';

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'category_id');
    }

    public function getOgImageUrlAttribute()
    {
        return $this->og_image
            ? asset('uploads/blog/' . $this->og_image)
            : asset('uploads/blog/' . $this->image);
    }
}
