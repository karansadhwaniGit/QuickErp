<?php

namespace App\Models;

use App\Http\Controllers\ProductsController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Categories extends Model
{
    use Sortable;
    use HasFactory;
    protected $fillable=['name'];
    public $sortable=['name'];
    public function getProducts()
    {
        return $this->hasMany(products::class,'category_id','id');
    }
}
