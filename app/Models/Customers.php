<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Customers extends Model
{
    use HasFactory;
    use Sortable;
    protected $guarded=[];
    public $sortable=['first_name','last_name','gst_no','email','phone_no'];
}
