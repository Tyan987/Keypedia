<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transactions extends Model
{
    use HasFactory;

    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function transactionDetails(){
        return $this->hasMany(transactionDetails::class, 'transaction_id');
    }

    public $timestamps = false;
}
