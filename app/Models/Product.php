<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $fillable = ['created_id','photo', 'type', 'price', 's','m', 'l', 'xl', 'xxl','xxxl',  'zero', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'eleven', 'twelve',
    'thirteen', 'quantity'];
    use HasFactory;

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function styles(): HasMany
    {
        return $this->hasMany(Style::class);
    }
}
