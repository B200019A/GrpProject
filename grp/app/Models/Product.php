<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=['name','description','price','quantity','clubid','typeId','image'];

    public function product(){
        return $this->belongsTo('App\Models\Club');
    }
}
