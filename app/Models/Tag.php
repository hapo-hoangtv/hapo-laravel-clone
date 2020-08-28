<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public $timestamps = false;
    protected $fillable = ['id', 'name'];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_tag');
    }
}
