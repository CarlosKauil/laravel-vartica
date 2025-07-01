<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rama extends Model
{
    use HasFactory;

    // Nombre de la tabla
    protected $table = 'ramas';

    // Clave primaria
    protected $primaryKey = 'id_rama';

    // Campos que pueden asignarse en masa
    protected $fillable = ['nombre_rama', 'id_area'];

    public $timestamps = false;

    /**
     * Relación muchos a uno: Cada rama pertenece a un área.
     */
    public function area()
    {
        return $this->belongsTo(Area::class, 'id_area');
    }
}
