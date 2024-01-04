<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cours_rameur extends Model
{
    use HasFactory;
    protected $fillable = ['cours_id','rameur_id'];
    protected $table = 'cours_rameur';
}
