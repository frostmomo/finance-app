<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\division;
use App\Models\position;

class employee extends Model
{
    use HasFactory;
    public function divisions(){
    	return $this->belongsTo(division::class);
    }

    public function positions(){
    	return $this->belongsTo(position::class);
    }

    public function payments(){
    	return $this->hasMany(payment::class);
    }

    use HasFactory;
    protected $fillable = ['name'];
}
