<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ejemplar extends Model
{
    use HasFactory;

    protected $table = 'ejemplares';
    protected $fillable = ['recurso_bibliografico_id', 'estado', 'ubicacion_id'];

    public function ubicacion()
    {
        return $this->belongsTo(Ubicacion::class);
    }

    public function movimientos()
    {
        return $this->hasMany(MovimientoEjemplar::class);
    }
}