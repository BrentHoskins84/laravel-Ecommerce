<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    function asDollars($value) {
        if ($value<0) return "-".asDollars(-$value);
        return '$' . number_format($value, 2);
    }

    public function presentPrice(){
        $price = $this->price / 100;
        return $this->asDollars($price);
    }
}
