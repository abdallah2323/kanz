<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public function instructor()
    {
        return $this->belongsTo(Instructor::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class,
         'course_user', 'course_id', 'user_id');
    }

    public function objectives()
    {
        return $this->hasMany(Objective::class);
    }

    public function lectures()
    {
        return $this->hasMany(Lecture::class);
    }

    public function first_lecture()
    {
        return $this->hasMany(Lecture::class)->limit(1);
    }

    public function files()
    {
        return $this->hasMany(File::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'course_id', 'id');
    }

    public function material()
    {
        return $this->belongsTo(Material::class, 'material_id', 'id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'course_id', 'id');
    }

    public function student()
    {
        return $this->hasOne(Student::class, 'course_id', 'id');
    }
}
