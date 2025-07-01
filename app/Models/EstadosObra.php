<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadosObra extends Model
{
    use HasFactory;

    // Nombre de la tabla en la base de datos
    protected $table = 'estados_obra';

    // Clave primaria de la tabla
    protected $primaryKey = 'id_estado';

    // Campos que pueden ser asignados en masa
    protected $fillable = [
        'nombre_estado',
    ];

    // Relación: Un estado puede estar asociado a varias obras
    public function obras()
    {
        return $this->hasMany(ObraArte::class, 'id_estado');
    }
}
