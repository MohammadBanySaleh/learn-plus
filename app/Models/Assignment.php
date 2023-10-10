<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'file',
        'deadline',
        'subject_id'
    ];

    public function subject() {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function assignment_solutions() {
        return $this->hasMany(Assignment_Solution::class);
    }
}
