<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Product extends Model 
{
    protected $table ='table_products';
    protected $primaryKey = 'product_id';
	protected $guarded = [];
    public $timestamps = false;
}
