<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_info extends Model
{
    protected $table = 'order_infos';
    protected $fillable = ['order_id','address','phone'];

}
