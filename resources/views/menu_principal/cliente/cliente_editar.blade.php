@extends('menu_principal/menu_cliente')


@section('contenido')
   <h1>editar cliente</h1>   
<form>
  <div>
    <div class="form-row">        
        <div class="form-group col-md-4">
            <label for="inputState">Seleccione cliente a editar</label>
            <select id="inputState" class="form-control">
                <option selected>Elegir...</option>
                @foreach ($clientes as $item)
                    <option><p> {{$item->nombre1}} {{$item->nombre2}}   {{$item->apellido1}}  {{$item->apellido2}}</p></option>                   
                @endforeach
            </select>
        </div>            
    </div>
    <button type="submit" class="btn btn-primary">Seleccionar</button>


    <h5>* datos cliente</h5>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputAddress">Primer Nombre</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="Jose" required>
        </div> 

        <div class="form-group col-md-6">
            <label for="inputAddress">Segundo Nombre</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="Juan">
        </div>    
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputAddress">Primer Apellido</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="Perez" required>
        </div> 

        <div class="form-group col-md-6">
            <label for="inputAddress">Segundo Apellido</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="Figueroa">
        </div>    
    </div>
    <div class="form-row">
        
        <div class="form-group col-md-6">
            <label for="inputEmail4">Telefono</label>
            <input type="text" class="form-control" id="inputEmail4" placeholder="1231231231" required>
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
            <input type="text" class="form-control" id="inputAddress" placeholder="esquina blanca">
        </div> 

        <div class="form-group col-md-4">
            <label for="inputAddress">Numero</label>
            <input type="number" class="form-control" id="inputAddress" placeholder="022">
        </div> 

        <div class="form-group col-md-4">
            <label for="inputAddress">Depto</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="52-b">
        </div> 

    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
<<<<<<< HEAD
=======
    </div>
>>>>>>> f173f3a50cba2a7ca792f0992ecfde50e6a6aeb2
</form>

@endsection