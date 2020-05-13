@extends('menu_principal/cliente/cliente_editar')
   
@section('edicion')

    <h5>* datos cliente</h5>
    <p>
    probando datos:
    {{$var}}
    <br>  
    
    @foreach ($cliente as $item)
            
    @endforeach
    </p>
<form>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputAddress">Primer Nombre</label>
            <input type="text" class="form-control" id="inputAddress" value="{{$item->nombre1}}" placeholder="Jose" required>
        </div> 

        <div class="form-group col-md-6">
            <label for="inputAddress">Segundo Nombre</label>
            <input type="text" class="form-control" id="inputAddress" value="{{$item->nombre2}}" placeholder="Juan">
        </div>    
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputAddress">Primer Apellido</label>
            <input type="text" class="form-control" id="inputAddress" value="{{$item->apellido1}}" placeholder="Perez" required>
        </div> 

        <div class="form-group col-md-6">
            <label for="inputAddress">Segundo Apellido</label>
            <input type="text" class="form-control" id="inputAddress" value="{{$item->apellido2}}" placeholder="Figueroa">
        </div>    
    </div>

    <div class="form-row">
        
        <div class="form-group col-md-6">
            <label for="inputEmail4">Telefono</label>
            <input type="text" class="form-control" id="inputEmail4" value="{{$item->telefono}}" placeholder="1231231231" required>
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
            <input type="text" class="form-control" id="inputAddress" value="1" placeholder="esquina blanca">
        </div> 

        <div class="form-group col-md-4">
            <label for="inputAddress">Numero</label>
            <input type="number" class="form-control" id="inputAddress" value="1" placeholder="022">
        </div> 

        <div class="form-group col-md-4">
            <label for="inputAddress">Depto</label>
            <input type="text" class="form-control" id="inputAddress" value="1" placeholder="52-b">
        </div> 
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>    
</form>

@endsection