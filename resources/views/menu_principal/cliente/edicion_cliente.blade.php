@extends('menu_principal/cliente/cliente_editar')
   
@section('edicion')

    <h5>* datos cliente</h5>
    
  
<form>
@csrf
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputAddress">Primer Nombre</label>
            <input type="text" class="form-control" id="inputAddress" value="{{$cliente[0]->nombre1}}" placeholder="Jose" required>
        </div> 

        <div class="form-group col-md-6">
            <label for="inputAddress">Segundo Nombre</label>
            <input type="text" class="form-control" id="inputAddress" value="{{$cliente[0]->nombre2}}" placeholder="Juan">
        </div>    
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputAddress">Primer Apellido</label>
            <input type="text" class="form-control" id="inputAddress" value="{{$cliente[0]->apellido1}}" placeholder="Perez" required>
        </div> 

        <div class="form-group col-md-6">
            <label for="inputAddress">Segundo Apellido</label>
            <input type="text" class="form-control" id="inputAddress" value="{{$cliente[0]->apellido2}}" placeholder="Figueroa">
        </div>    
    </div>

    <div class="form-row">
        
        <div class="form-group col-md-6">
            <label for="inputEmail4">Telefono</label>
            <input type="text" class="form-control" id="inputEmail4" value="{{$cliente[0]->telefono}}" placeholder="1231231231" required>
        </div>           
    </div>


    <h5>* direccion</h5>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputState">Region</label>
            <select id="inputState" class="form-control">
            <option selected>Elegir...</option>               
                @foreach ($regiones as $item)
                    <option> {{$item->region}}</option>                   
                @endforeach
            </select>
        </div>

        <div class="form-group col-md-6">
            <label for="inputState">Comuna</label>
            <select id="inputState" class="form-control">
            <option selected>Elegir...</option>       
                @foreach ($comunas as $item)
                    <option> {{$item->comuna}}</option>                   
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputAddress">Calle</label>
            <input type="text" class="form-control" id="inputAddress" value="{{$direccion[0]->calle}}" placeholder="esquina blanca">
        </div> 

        <div class="form-group col-md-4">
            <label for="inputAddress">Numero</label>
            <input type="number" class="form-control" id="inputAddress" value="{{$direccion[0]->numero}}" placeholder="022">
        </div> 

        <div class="form-group col-md-4">
            <label for="inputAddress">Depto</label>
            <input type="text" class="form-control" id="inputAddress" value="{{$direccion[0]->departamento}}" placeholder="52-b">
        </div> 
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>    
</form>

@endsection