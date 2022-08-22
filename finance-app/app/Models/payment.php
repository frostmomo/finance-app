<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    use HasFactory;

    public function employees(){
    	return $this->belongsTo(employee::class);
    }

    public function attendances(){
    	return $this->belongsTo(attendance::class);
    }
}
