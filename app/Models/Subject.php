<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'grade_id',
        'teacher_id',
        'image'
    ];

    public function grade() {
        return $this->belongsTo(Grade::class, 'grade_id');
    }

    public function teacher() {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }

    public function contents() {
        return $this->hasMany(Content::class);
    }

    public function assignments() {
        return $this->hasMany(Assignment::class);
    }


}
