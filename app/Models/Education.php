<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $table = 'educations';

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function attachments()
    {
        return $this->hasMany(Library::class);
    }
}
