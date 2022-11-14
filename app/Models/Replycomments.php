<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Replycomments extends Model
{
    use HasFactory;
    protected $fillable = ['idcomment','iduser', 'content', 'visible'];

}
