<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriversSeason extends Model
{
    use HasFactory;

    protected $fillable = [
        'position',
        'country',
        'name',
        'points'
    ];

    static function positionOrder($driversSeasons){

        $position = 0;
        foreach ($driversSeasons as $item) {
            $position += 1;
            $item->position = $position;
        }
        return($driversSeasons);
    }
}
