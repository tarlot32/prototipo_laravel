<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'proveedores';

    protected $fillable = [
        'nombre_empresa',
        'contacto',
        'telefono',
        'direccion',
    ];

    public function productos()
    {
        return $this->hasMany(Productos::class, 'proveedor_id');
    }
}
