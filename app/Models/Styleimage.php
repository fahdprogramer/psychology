<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Styleimage extends Model
{
    protected $fillable = ['style_id','name'];
    use HasFactory;
}
