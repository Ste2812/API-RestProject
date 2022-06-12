<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class DiceGame extends Model
{

    use HasFactory;

    protected $fillable = [
        'dice_one',
        'dice_two',
        'result',
        'success_result',
       // 'average_ranking'
    ];

}
