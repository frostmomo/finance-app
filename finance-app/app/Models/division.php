<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class division extends Model
{

    public function employees(){
    	return $this->hasMany(division::class);
    }

    use HasFactory;
    protected $fillable = ['name'];
}
