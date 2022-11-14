<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currentcar extends Model
{
    use HasFactory;
    protected $fillable = ['idproduct', 'iduser', 'activity', 'fuelusage', 'kmdriven', 'battery'];

}
