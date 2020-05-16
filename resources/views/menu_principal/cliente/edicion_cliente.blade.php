@extends('menu_principal/cliente/cliente_editar')
   
@section('edicion')

    <h5>* datos cliente</h5>
<form>
@csrf
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputAddress">Primer Nombre</label>
            <input type="text" class="form-control" id="inputAddress" value="{{$cliente[0]->nombre1}}" placeholder="" required>
        </div> 

        <div class="form-group col-md-6">
            <label for="inputAddress">Segundo Nombre</label>
            <input type="text" class="form-control" id="inputAddress" value="{{$cliente[0]->nombre2}}" placeholder="">
        </div>    
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputAddress">Primer Apellido</label>
            <input type="text" class="form-control" id="inputAddress" value="{{$cliente[0]->apellido1}}" placeholder="" required>
        </div> 

        <div class="form-group col-md-6">
            <label for="inputAddress">Segundo Apellido</label>
            <input type="text" class="form-control" id="inputAddress" value="{{$cliente[0]->apellido2}}" placeholder="">
        </div>    
    </div>

    <div class="form-row">
        
        <div class="form-group col-md-6">
            <label for="inputEmail4">Telefono</label>
            <input type="text" class="form-control" id="inputEmail4" value="{{$cliente[0]->telefono}}" placeholder="" required>
        </div>        

        <div class="form-group col-md-6">
            <label for="inputAddress">Fecha de nacimiento</label>
            <input type="date" name="fecha_nacimiento" class="form-control" id="inputAddress" value="{{$year}}-{{$month}}-{{$day}}">
        </div>   
    </div>


    <h5>* direccion</h5>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputState">Region</label>
            <select id="selectRegion" class="form-control">          
                @foreach ($regiones as $item)
                    @if($item->id_region === $region[0]->id_region )
                        <option value="{{$item->id_region}}" selected> {{$item->region}}</option>
                    @else
                        <option value="{{$item->id_region}}"> {{$item->region}}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="form-group col-md-6">
            <label for="inputState">Comuna</label>
            <select id="selectComuna" class="form-control">
                @foreach ($comunas as $item)
                    @if($item->id_comuna === $comuna[0]->id_comuna ){
                        <option value="{{$item->id_comuna}}" selected> {{$item->comuna}}</option>
                    @else
                        <option value="{{$item->id_comuna}}"> {{$item->comuna}}</option>
                    @endif                                    
                @endforeach
            </select>
        </div>
    </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputAddress">Calle</label>
            <input type="text" class="form-control" id="inputAddress" value="{{$direccion[0]->calle}}" placeholder="">
        </div> 

        <div class="form-group col-md-4">
            <label for="inputAddress">Numero</label>
            <input type="number" class="form-control" id="inputAddress" value="{{$direccion[0]->numero}}" placeholder="">
        </div> 

        <div class="form-group col-md-4">
            <label for="inputAddress">Depto</label>
            <input type="text" class="form-control" id="inputAddress" value="{{$direccion[0]->departamento}}" placeholder="">
        </div> 
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>    
</form>

@endsection