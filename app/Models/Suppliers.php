<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suppliers extends Model
{
    protected $guarded=[];
    use HasFactory;
    public function address(){
        return $this->belongsToMany(Address::class,'address_suppliers');
    }
}
