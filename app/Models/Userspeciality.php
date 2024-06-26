<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Userspeciality extends Model
{
    protected $fillable = ['user_id','speciality_id'];
    use HasFactory;
    public function speciality(): HasOne
    {
        return $this->hasOne(Specialization::class, 'id', 'speciality_id');
    }
}