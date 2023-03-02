<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseTopics extends Model
{
    use HasFactory;
    protected $fillable = ['id','courseID','topicNumber','topicName','courseNotes','courseVideos'];


    public function courses()
    {
        return $this->belongsTo(Courses::class, 'courseID','id');
    }
}
