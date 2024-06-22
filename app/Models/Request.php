<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $fillable = ['req_num','totale','name','user_id','style_id','situation','size','quantity','user_name','address','phone','add_inf'];
    use HasFactory;
}
