<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasFactory;


    public function education()
    {
        return $this->belongsTo(Education::class, 'education_id', 'id');
    }

    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id', 'id');
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class,
         'course_user', 'user_id', 'course_id');
    }

    public function messages()
    {
        return $this->hasMany(Contact::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'user_id', 'id');
    }

    public function student()
    {
        return $this->hasOne(Student::class, 'user_id', 'id');
    }
}
