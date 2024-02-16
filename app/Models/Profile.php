<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $table = 'profile';
    protected $fillable = [
        'name','google_maps','address','complete_address','phone','email','information','open','vidio'
    ];
}
