<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Suppliers extends Model
{
    use Sortable;
    protected $guarded=[];
    use HasFactory;
    public $sortable=['first_name','gst_no','company_name','phone_no','email'];
    public function address(){
        return $this->belongsToMany(Address::class,'address_suppliers');
    }
}
