<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dettagli extends Model
{
    use HasFactory;
    protected $table = 'dettagli';

    public function annunci()
    {
        return $this->hasMany(Annuncio::class);
    }
}
