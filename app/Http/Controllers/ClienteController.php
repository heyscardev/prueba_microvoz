<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\TipoCliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::all();
        $tipos = TipoCliente::all();
        return view("Clientes.index", compact('clientes','tipos'));
    }

  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validacion = $request->validate([
            'nombre' => 'required|max:100|alpha',
            'apellido' => 'required|max:100|alpha',
            'email' => 'required|max:255',
            'organizacion' => 'required|max:255|alpha',
            'telefono' => 'required|max:255|min:11',
            'descripcion' => 'max:255',
            'tipo_cliente_id' => 'required'
        ]);
        $cliente = new Cliente([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'email' => $request->email,
            'organizacion' => $request->organizacion,
            'telefono' => $request->telefono,
            'descripcion' => $request->descripcion,
            'tipo_cliente_id' => $request->tipo
        ]);
        $cliente->save();
        
        return  redirect()->route('cliente.index');
    }

   
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        $validacion = $request->validate([
            'nombre' => 'required|max:100|alpha',
            'apellido' => 'required|max:100|alpha',
            'email' => 'required|max:255',
            'organizacion' => 'required|max:255|alpha',
            'telefono' => 'required|max:255|min:11',
            'descripcion' => 'max:255',
            'tipo_cliente_id' => 'required'
        ]);
        $cliente->nombre = $request->nombre;
        $cliente->apellido= $request->apellido;
        $cliente->email= $request->email;
        $cliente->organizacion= $request->organizacion;
        $cliente->telefono= $request->telefono;
        $cliente->descripcion= $request->descripcion;
        $cliente->Tipo_cliente_id= $request->tipo;
        $cliente->save();
        return redirect()->route('cliente.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
    $cliente->delete();
    return redirect()->route("cliente.index");
    }
}
