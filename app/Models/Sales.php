<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $fillable=[];
    use HasFactory;
    public function products() {
        return $this->hasOne(products::class,'id');
    }
}
