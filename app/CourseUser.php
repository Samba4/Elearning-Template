<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class CourseUser extends Model
{

    protected $table = 'course_user';
    protected $fillable = ['user_id', 'course_id'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function courspaye(Course $course)
    {
        return DB::select('select * from course_user where course_id = ' . $course->id . ' AND user_id = ' . Auth::user()->id . '');
    }
}
