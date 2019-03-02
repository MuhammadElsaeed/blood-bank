<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model 
{

    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable = array('name', 'email', 'date_of_birth', 'phone', 'blood_type_id', 'password', 'city_id','last_donation');
    protected $hidden = array('password','api_token');
    
    public function city()
    {
        return $this->belongsTo('App\models\City');
    }

    public function donationRequests()
    {
        return $this->hasMany('App\models\DonationRequest');
    }

    public function notifications()
    {
        return $this->belongsToMany('App\models\Notification');
    }

    public function governorates()
    {
        return $this->belongsToMany('App\models\Governorate');
    }

    public function bloodType()
    {
        return $this->belongsTo('App\models\BloodType');
    }

    public function bloodTypes()
    {
        return $this->belongsToMany('App\models\BloodType');
    }

    public function articles()
    {
        return $this->belongsToMany('App\models\Article');
    }

}