<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model 
{

    protected $table = 'settings';
    public $timestamps = true;
    protected $fillable = array('phone', 'email', 'facebook_url', 'twitter_url', 'youtube_url', 'instagram_url', 'whatsapp_url', 'google_url', 'about', 'android_app_url', 'ios_app_url');

}