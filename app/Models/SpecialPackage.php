<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecialPackage extends Model
{
    use HasFactory;

    protected $table = 'special_package';
    protected $fillable = [
        'name','description','price','stock','image'
    ];
}
