<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    // Definir la tabla si no sigue la convención plural de Laravel
    protected $table = 'areas';

    // Definir la clave primaria correctamente
    protected $primaryKey = 'id_area';

    // Especificar si la clave primaria es auto-incremental
    public $incrementing = true;

    // Definir los campos asignables en masa
    protected $fillable = ['nombre_area'];

    // Indicar si la tabla tiene timestamps
    public $timestamps = false;

    /**
     * Relación uno a muchos: Un área tiene muchas ramas.
     */
    public function ramas()
    {
        return $this->hasMany(Rama::class, $id_ramas);
    }
}
