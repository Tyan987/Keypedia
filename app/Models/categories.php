<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    use HasFactory;

    public function keyboards(){
        return $this->hasMany(keyboards::class, 'category_id');
    }

    public $timestamps = false;
}
