<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userSignUp extends Model
{
    use HasFactory;
    protected $fillable = ['username','fullname', 'email', 'phone', 'address','birtdate','password','image_name'];
}
