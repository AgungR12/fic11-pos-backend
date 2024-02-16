<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuperiorityEvent extends Model
{
    use HasFactory;

    protected $table = 'superiority_event';
    protected $fillable = [
        'subject','description','information','status'
    ];
}
