<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BloodType extends Model {

    public $timestamps = true;
    protected $fillable = array('name');

    public function clients() {
        return $this->belongsToMany('App\Models\Client');
    }

}
