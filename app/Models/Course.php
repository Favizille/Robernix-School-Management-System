<?php

namespace App\Models;

use App\Models\Score;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $guarded = [];
 
    public function scores()
    {
        return $this->hasMany(Score::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'course_user');
    }

}
