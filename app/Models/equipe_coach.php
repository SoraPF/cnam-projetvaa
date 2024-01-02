<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class equipe_coach extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_equipe',
        'id_coach',
    ];
}
