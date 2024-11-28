<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Livre extends Model
{
    use HasFactory;

    // Autoriser l'affectation de masse pour ces champs
    protected $fillable = ['titre', 'auteur', 'annee', 'description'];
}
