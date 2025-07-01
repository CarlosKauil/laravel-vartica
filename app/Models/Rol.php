<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Rol extends Model
{
    use HasFactory;

    /** 
     * Tabla asociada al modelo. 
     */
    protected $table = 'roles';

    /** 
     * Clave primaria del modelo. 
     */
    protected $primaryKey = 'id_rol';

    /** 
     * Indica que la clave primaria no es autoincrementable. 
     */
    public $incrementing = true;

    /** 
     * Tipo de clave primaria. 
     */
    protected $keyType = 'int';

    /** 
     * Indica que el modelo no maneja timestamps. 
     */
    public $timestamps = false;

    /** 
     * Los atributos que pueden asignarse en masa. 
     */
    protected $fillable = [
        'nombre_rol',
    ];

    /** 
     * Relación con la tabla 'usuarios'.
     */
    public function usuarios(): HasMany
    {
        return $this->hasMany(User::class, 'id_rol', 'id_rol');
    }
}
