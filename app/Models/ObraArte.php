<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObraArte extends Model
{
    use HasFactory;

    protected $table = 'obras_arte';
    protected $primaryKey = 'id_obra';

    protected $fillable = [
        'id_usuario', // Se cambió de 'id_artista' a 'id_usuario'
        'archivo',
        'nombre_obra',
        'anio',
        'rama_artistica',
        'genero',
        'descripcion',
        'id_estado',
    ];

    // Relación: Una obra pertenece a un usuario (antes artista)
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario', 'id_usuario');
    }
    

    // Relación: Una obra tiene un estado
    public function estado()
    {
        return $this->belongsTo(EstadosObra::class, 'id_estado');
    }
}

