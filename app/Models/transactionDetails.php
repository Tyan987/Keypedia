<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transactionDetails extends Model
{
    use HasFactory;

    public function keyboards(){
        return $this->belongsTo(keyboards::class, 'keyboard_id');
    }

    public function transactions(){
        return $this->belongsTo(carts::class, 'transactions_id');
    }

    public $timestamps = false;
}
