<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Style extends Model
{
    protected $fillable = [
        'created_id', 'product_id', 'color', 'ageORsize', 's', 'm', 'l', 'xl', 'xxl', 'xxxl', 'nbr_s', 'nbr_m', 'nbr_l',
        'nbr_xl', 'nbr_xxl', 'nbr_xxxl', 'zero', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'eleven', 'twelve',
        'thirteen', 'nbr_zero', 'nbr_one', 'nbr_two', 'nbr_three', 'nbr_four', 'nbr_five', 'nbr_six', 'nbr_seven', 'nbr_eight', 'nbr_nine', 'nbr_ten', 'nbr_eleven', 'nbr_twelve', 'nbr_thirteen'
    ];
    use HasFactory;

    public function nbr($symbol)
    {

        if ($symbol == 's' || $symbol == 'one') {
            return $this->nbr_s;
        }
        if ($symbol == 'm' || $symbol == 'three') {
            return $this->nbr_m;
        }
        if ($symbol == 'l' || $symbol == 'five') {
            return $this->nbr_l;
        }
        if ($symbol == 'xl' || $symbol == 'seven') {
            return $this->nbr_xl;
        }
        if ($symbol == 'xxl' || $symbol == 'nine') {
            return $this->nbr_xxl;
        }
        if ($symbol == 'xxxl' || $symbol == 'eleven') {
            return $this->nbr_xxxl;
        }
    }

    public function images(): HasMany
    {
        return $this->hasMany(Styleimage::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
