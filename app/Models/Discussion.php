<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    use HasFactory;
    protected $fillable = ['sender_id','reciver_id', 'content', 'discussion_id','is_reading'];
}
