<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Superiority extends Model
{
    use HasFactory;

    protected $table = 'superiority';

    protected $fillable = [
        'subject','description','information','status',
    ];
}
