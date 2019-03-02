<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model 
{

    protected $table = 'articles';
    public $timestamps = true;
    protected $fillable = array('title', 'image_url', 'description', 'content');

    public function clients()
    {
        return $this->belongsToMany('App\Models\Client');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category');
    }

}