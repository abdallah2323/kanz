<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    use HasFactory;

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id', 'id');
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function cv()
    {
        return $this->hasMany(Cv::class, 'instructor_id', 'id');
    }
}
