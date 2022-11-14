<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carts extends Model
{
    use HasFactory;
    protected $fillable = ['iduser', 'idcar', 'name_product', 'number_of_product','price_product','product_image'];

}
