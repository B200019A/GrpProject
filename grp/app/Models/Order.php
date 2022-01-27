<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable=['paymentStatus','userID','amount'];

    public function user(){
        return $this->belongTo('App\Models\User');

    }
}
