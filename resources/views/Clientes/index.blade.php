
@section('contenido')
<div class="container">

    
    <h1 class="text-indigo-100">clientes</h1>
    <table class="table table-hover bg-light rounded shadow-lg" >
        <thead>
            <tr>
                <th class="text-primary">Id</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Organizacion</th>
                <th>Numero Telefonico</th>
                <th>Tipo de Cliente</th>
                <th>Descripcion tipo</th>
                <th>acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente )
            <tr>
                <td class="text-primary"> {{ $cliente->id }} </td>
                <td> {{ $cliente->nombre }} </td>
            
                <td> {{ $cliente->apellido }} </td>
           
                <td> {{ $cliente->email }} </td>
          
                <td> {{ $cliente->organizacion }} </td>
            
                <td> {{ $cliente->telefono }} </td>
           
                <td> {{ $cliente->TipoCliente->tipo }} </td>
           
                <td > {{ $cliente->descripcion }} </td>
                <td class=""> 
                    <button type="button" class="btn btn-primary w-32 ms-2"
                     data-cliente ="{{$cliente->id}},{{$cliente->nombre}},{{$cliente->apellido}},{{$cliente->email}},{{$cliente->organizacion}},{{$cliente->telefono}},{{$cliente->tipo_cliente_id}},{{$cliente->descripcion}}"  
                     data-action="{{route('cliente.update',$cliente->id)}}"
                     data-bs-toggle="modal" 
                     data-bs-target="#cliente-modal" onclick="invokeModalEdit(this)" ><img src="{{asset('icons/edit.svg')}}" alt="edit"></button></td>
                <td>  <button type="button" class="ms-2 btn btn-secondary w-32" data-action="{{ route('cliente.destroy', $cliente->id) }}" data-bs-target="#modal-delete" data-bs-toggle="modal" onclick="invokeModalDelete(this)"><img src="{{asset('icons/trash.svg')}}" alt="delete"></button></td>
            </tr>
            <div class="position-fixed fixed-bottom d-flex justify-content-end ">
                <button  data-bs-toggle="modal" data-bs-target="#cliente-modal" data-action="{{route('cliente.store')}}"  class="btn btn-primary  rounded-pill  me-4 mb-4 " onclick="invokeModalCreate(this)"><img src="{{asset('icons/plus.svg')}}" alt=""></button>
            </div>
                
            @endforeach
        </tbody>
    </table>
    
      
      <!-- Modal -->
      <div class="modal fade" id="cliente-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="cliente-modal-title">Registro Cliente</h5>
            
            </div>
            <div class="modal-body">
                <form action="{{ route('cliente.store')}}" id="form-cliente" method="POST">
                    @csrf
                    @method('post')
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input class="form-control" type="text" id="nombre" maxlength="100" minlength="2"  name="nombre"
                            placeholder="introduce nombre de cliente" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Apellido</label>
                        <input class="form-control" type="text" id="apellido" maxlength="100" minlength="2"  name="apellido"
                            placeholder="introduce apellido de cliente" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Correo</label>
                        <input class="form-control" type="email" id="email" maxlength="250" minlength="2"  name="email"
                            placeholder="introduce correo del cliente" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="organizacion">Organizacion</label>
                        <input class="form-control" type="text" id="organizacion" maxlength="250" minlength="2"  name="organizacion"
                            placeholder="introduce organizacion del cliente" value="" required>
                    </div>
                    <div class="form-group">
                        <label class="" for="telefono">numero de telefono</label>
                        <input class="form-control" type="tel" maxlength="25" id="telefono" name="telefono"
                            placeholder="introduce telefono de cliente" value="" required>
                    </div>
                    <div class="form-group">
                        <label class="" for="tipo">tipo de cliente</label>
                        <select class="form-control" name="tipo" id="tipo">
                            @foreach ($tipos as $t)
                                <option value="{{ $t->id }}">{{ $t->tipo }}</option>
                            @endforeach
                        </select>
                
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripcion</label>
                        <input class="form-control" type="textarea" id="descripcion" maxlength="200" minlength="2"  name="descripcion"
                            placeholder="introduce descripcion  del tipo cliente (otro)" value="" >
                    </div>
                    <div class="mt-3 text-center">
                        <a href="" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</a>
                        <button class="btn btn-primary" type="submit">Guardar</button>
                    </div>
    
    
                </form>
            </div>
           
          </div>
        </div>
      </div>
      <div class="modal fade" id="modal-delete" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmacion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    ¿Estas Seguro de eliminar este recurso?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">NO</button>
                    <form  id="delete-form" action="hola" method="POST"  style="display:inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger" type="submit">SI</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

      <script >
          
          const deleteForm = document.getElementById('delete-form')
          let cform = document.getElementById('form-cliente');
          let inputs = cform.getElementsByTagName('input');
          let tmodal = document.getElementById('cliente-modal-title');

          const invokeModalDelete = (e)=>{
              deleteForm.action = e.getAttribute('data-action');
          }

          const invokeModalEdit = (e)=>{
              
             let c = e.getAttribute('data-cliente').split(',');
             tmodal.innerHTML = "Editando  cliente " + c[0];
             inputs[1].value = 'put';
            inputs[2].value = c[1];
            inputs[3].value = c[2];
            inputs[4].value = c[3];
            inputs[5].value = c[4];

            inputs[6].value = c[5];
           document.getElementById("tipo").value = c[6];
           cform.action = e.getAttribute('data-action');
          }
          const invokeModalCreate = (e)=>{
              
            
              tmodal.innerHTML = "registrando Cliente " ;
              inputs[1].value = 'post';
             inputs[2].value = ""
             inputs[3].value =""
             inputs[4].value = ""
             inputs[5].value = ""
 
             inputs[6].value = ""
            document.getElementById("tipo").value = ""
            cform.action = e.getAttribute('data-action');
           }
         
             document.getElementById('telefono').ke
           
      </script>
@endsection


@include('index')