<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;
    
    protected $guarded = [];
    
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function term()
    {
        return $this->belongsTo(Term::class);
    }
    
    // Logic to calculate total and grade
    public function calculateResult()
    {
        $this->total = $this->test_1 + $this->test_2 + $this->exam;
        
        if ($this->total >= 70) $this->grade = 'A';
        elseif ($this->total >= 60) $this->grade = 'B';
        elseif ($this->total >= 50) $this->grade = 'C';
        elseif ($this->total >= 45) $this->grade = 'D';
        else $this->grade = 'F';
        
        $this->save();
    }
}
