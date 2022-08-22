<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class attendance extends Model
{
    public function payments(){
    	return $this->hasMany(payment::class);
    }

    use HasFactory;
    protected $fillable = ['attendAmount','illAmount','absenceAmount'];
}
