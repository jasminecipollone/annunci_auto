<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annuncio extends Model
{
    use HasFactory;
    protected $table = 'annunci';

    public function comuni()
    {
        return $this->belongsTo(Comune::class, 'comune_id', 'id');
    }

    public function modelli()
    {
        return $this->belongsTo(Modello::class, 'modello_id', 'id');
    }

    public function dettagli()
    {
        return $this->belongsTo(Dettagli::class, 'id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function immagini()
    {
        return $this->belongsTo(Immagine::class);
    }
}
