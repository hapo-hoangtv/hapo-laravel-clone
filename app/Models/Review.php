<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Review extends Model
{
    public $timestamps = false;
    protected $table = 'reviews';
    protected $fillable = ['lesson_id', 'course_id', 'user_id', 'content', 'time', 'rating', 'target_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
