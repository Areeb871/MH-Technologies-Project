<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = ['name'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_section')->whereHas('roles', function($query) {
            $query->where('name', 'Student');
        });
    }
    public function lectures()
    {
        return $this->belongsToMany(Lecture::class,'lecture_section');
    }
    public function attendances()
    {
        return $this->hasMany(Attendence::class);
    }
}
