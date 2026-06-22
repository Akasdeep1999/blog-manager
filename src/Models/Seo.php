<?php

namespace Mycompany\BlogManager\Models;

use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    protected $table = 'seos';

    protected $fillable = [
        'meta_title',
        'meta_description',
        'meta_keyword',

        'page_title',
        'page_slug',

        'author',
        'locale',

        'og_title',
        'ogimage',
        'og_description',

        'twitter_card',
        'twitter_site',
        'twitter_title',
        'twitter_description',
        'twitter_image',
    ];
}
