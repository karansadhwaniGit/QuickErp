<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    protected $guarded=[];
    use HasFactory;
    public function suppliers(){
        return $this->belongsTo(Suppliers::class,'supplier_id');
    }
    public function getCategory(){
        return $this->belongsTo(Categories::class,'category_id');
    }
}
