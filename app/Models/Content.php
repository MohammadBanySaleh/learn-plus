<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'image',
        'image_caption',
        'video',
        'video_caption',
        'file',
        'file_caption',
        'subject_id'
    ];

    public function subject() {
        $this->belongsTo(Subject::class, 'subject_id');
    }
}
