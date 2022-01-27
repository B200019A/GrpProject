<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable=['userID','clubID','orderID','productID','quantity'];

    public function product(){

        return $this->belongsTo('App\Model\Product');

    }
    public function user(){

        return $this->belongsTo('App\User');

    }
    public function Club(){

        return $this->belongsTo('App\Models\Club');

    }

}
