<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class Kunacademy extends Model
{
  
     protected $table = 'Kunacademies';

    protected $primaryKey = 'id';
    protected $fillable = [
        'code', 'name','maximum_students','status','description','created_at','updated_at'
    ];
    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
