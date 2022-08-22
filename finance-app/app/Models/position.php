<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class position extends Model
{
    public function employees(){
    	return $this->hasMany(employee::class);
    }

    use HasFactory;
    protected $fillable = ['name','amount'];
}
