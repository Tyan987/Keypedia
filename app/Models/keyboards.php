<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class keyboards extends Model
{
    use HasFactory;

    public function categories(){
        return $this->belongsTo(categories::class, 'category_id');
    }

    public function tranDet(){
        return $this->hasMany(transactionDetails::class, 'keyboard_id');
    }

    public function cartDet(){
        return $this->hasMany(cartDetails::class, 'keyboard_id');
    }

    public $timestamps = false;
}
