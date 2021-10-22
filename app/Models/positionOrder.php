<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PositionOrder extends Model
{
    use HasFactory;

    static function positionOrder($table)
    {
        $position = 0;
        foreach ($table as $item) {
            $position += 1;
            $item->position = $position;
        }
        return ($table);
    }
}
