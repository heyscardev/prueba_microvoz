<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoCliente extends Model
{
    protected $fillable = ["tipo"];
    use HasFactory;
    public function Clientes(){
        return $this->hasMany(TipoCliente::class);
    }
}
