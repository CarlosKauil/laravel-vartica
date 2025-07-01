<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artista extends Model
{
    use HasFactory;

    // Especifica el nombre de la tabla en la base de datos
    protected $table = 'artistas';

    // Define la clave primaria de la tabla
    protected $primaryKey = 'id_artista';

    // Habilita los timestamps (created_at y updated_at)
    public $timestamps = true;  

    // Define los campos que pueden ser asignados masivamente
    protected $fillable = [
        'id_usuario',           // Relación con la tabla de usuarios
        'aleas',                // Nombre artístico del artista
        'fecha_nacimiento',     // Fecha de nacimiento del artista
        'id_area',              // Relaciona un área con el artista
        'created_at',           // Fecha de creación del registro
        'updated_at'            // Última actualización del registro
    ];

    /**
     * Relación con el modelo User.
     * Un artista pertenece a un usuario.
     * Esto permite acceder a los datos del usuario relacionado con el artista.
     */
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario', 'id_usuario');
        // Primer parámetro: Modelo relacionado (User::class)
        // Segundo parámetro: Clave foránea en la tabla artistas (id_usuario)
        // Tercer parámetro: Clave primaria en la tabla usuarios (id_usuario) → Corregido
    }
}
