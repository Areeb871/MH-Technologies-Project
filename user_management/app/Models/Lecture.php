<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description'];

    public function sections()
    {
        return $this->belongsToMany(Section::class,'lecture_section');
    }
}
