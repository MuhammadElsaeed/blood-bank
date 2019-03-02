<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonationRequest extends Model {

    protected $table = 'donation_requests';
    public $timestamps = true;
    protected $fillable = array('patient_name', 'patient_age', 'city_id', 'bags_number', 'hospital_name', 'hospital_latitude', 'hospital_longitude', 'phone', 'blood_type_id', 'notes');

    public function client() {
        return $this->belongsTo('App\Models\Client');
    }

    public function city() {
        return $this->belongsTo('App\Models\City');
    }

    public function bloodType() {
        return $this->belongsTo('App\Models\BloodType');
    }

    public function notification() {
        return $this->hasOne('App\models\Notification');
    }

}
