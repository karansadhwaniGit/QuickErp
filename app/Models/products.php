<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class products extends Model
{
    protected $guarded=[];
    use HasFactory;
    use Sortable;
    public function suppliers(){
        return $this->belongsTo(Suppliers::class,'supplier_id');
    }
    public function getCategory(){
        return $this->belongsTo(Categories::class,'category_id');
    }
    public $sortable=['product_name','specification','hsn','supplier_id','category_id','selling_price','eoq','danger_level'];
}
