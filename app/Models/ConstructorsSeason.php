<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConstructorsSeason extends Model
{
    use HasFactory;

    protected $fillable = [
        'position',
        'name',
        'points'
    ];
}
