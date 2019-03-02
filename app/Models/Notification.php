<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model 
{

    protected $table = 'notifications';
    public $timestamps = true;
    protected $fillable = array('client_id', 'donation_request_id', 'title', 'content');

    public function clients()
    {
        return $this->belongsToMany('App\Models\Client');
    }

    public function donationRequest()
    {
        return $this->belongsTo('App\Models\DonationRequest');
    }

}