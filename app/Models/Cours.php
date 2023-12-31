<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
    use HasFactory;

    protected $fillable = ['titre', 'description', 'niveau', 'coach_id'];

    public function coach()
    {
        return $this->belongsTo(User::class, 'coach_id');
    }

    public function participants()
    {
        return $this->belongsToMany(User::class, 'cours_rameur', 'cours_id', 'rameur_id')
            ->where('role', '=', 'participant');
    }
}