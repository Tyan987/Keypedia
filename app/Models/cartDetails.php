<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cartDetails extends Model
{
    use HasFactory;

    public function keyboards(){
        return $this->belongsTo(keyboards::class, 'keyboard_id');
    }

    public function carts(){
        return $this->belongsTo(carts::class, 'cart_id');
    }

    public $timestamps = false;
}
