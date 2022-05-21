<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable = ["nombre","apellido","email","organizacion", "telefono","descripcion","tipo_cliente_id"];
    
    public function TipoCliente(){
        return $this->belongsTo(TipoCliente::class);
    }
}
