<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment_Solution extends Model
{
    use HasFactory;
    protected $table = 'assignment_solutions';

    protected $fillable = [
        'solution',
        'file',
        'image',
        'mark',
        'assignment_id',
        'student_id'
    ];

    public function assignment() {
        return $this->belongsTo(Assignment::class, 'assignment_id');
    }

    public function student() {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
