<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Sponsorship extends Model
{
    use HasFactory;
    protected $fillable = ['student_id','teacher_id', 'title', 'state', 'content','presence'];
    
    public function student(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'student_id');
    }
    public function teacher(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'teacher_id');
    }
    
}