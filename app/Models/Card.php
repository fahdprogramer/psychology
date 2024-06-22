<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Card extends Model
{
    protected $fillable = ['name','user_id','style_id','situation','size','quantity'];
    use HasFactory;

    public function style(): HasOne
    {
        return $this->hasOne(Style::class, 'id', 'style_id');
    }
}
