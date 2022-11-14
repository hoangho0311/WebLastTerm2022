<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infors extends Model
{
    use HasFactory;
    protected $fillable = ['iduser', 'fname', 'lname', 'address', 'city', 'country', 'description'];

}
