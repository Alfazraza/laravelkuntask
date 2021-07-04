<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
	protected $table = 'students';

    protected $primaryKey = 'id';

     protected $fillable = [
        'first_name', 'last_name','kunacademy_id','date_of_birth'
    ];

    function student() {
        return $this->belongsTo('Kunacademy', 'id');
    }
}
