@extends('menu_principal/cliente/cliente_editar')
   
@section('edicion')

    <h5>* Datos cliente</h5>
<form action="{{route('actualizar_cliente')}}" method="POST">
{{ csrf_field() }}
    <div class="form-row">
    <input type="hidden" id="rut" name="rut" value="{{$cliente[0]->rut}}">

        <div class="form-group col-md-6">
            <label for="inputAddress">Primer Nombre</label>
            <input type="text" class="form-control" id="nombre1" name="nombre1" value="{{$cliente[0]->nombre1}}" placeholder="" onkeypress="return (event.charCode > 64 && 
            event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)"required>
        </div> 

        <div class="form-group col-md-6">
            <label for="inputAddress">Segundo Nombre</label>
            <input type="text" class="form-control" id="nombre2" name="nombre2" value="{{$cliente[0]->nombre2}}" placeholder="" onkeypress="return (event.charCode > 64 && 
            event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" required>
        </div>    
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputAddress">Primer Apellido</label>
            <input type="text" class="form-control" id="apellido1" name="apellido1" value="{{$cliente[0]->apellido1}}" placeholder="" onkeypress="return (event.charCode > 64 && 
            event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" required>
        </div> 

        <div class="form-group col-md-6">
            <label for="inputAddress">Segundo Apellido</label>
            <input type="text" class="form-control" id="apellido2" name="apellido2" value="{{$cliente[0]->apellido2}}" placeholder="" onkeypress="return (event.charCode > 64 && 
            event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" required>
        </div>    
    </div>

    <div class="form-row">
        
        <div class="form-group col-md-6">
            <label for="inputEmail4">Telefono</label>
            <input type="text" class="form-control" id="telefono" name="telefono" value="{{$cliente[0]->telefono}}" placeholder="" required>
        </div>        

        <div class="form-group col-md-6">
            <label for="inputAddress">Fecha de nacimiento</label>
            <input type="date" name="fecha_nacimiento" class="form-control" id="fecha_nacimiento" value="{{$year}}-{{$month}}-{{$day}}">
        </div>   
    </div>


    <h5>* Direccion</h5>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputState">Region</label>
            <select id="selectRegion" name="selectRegion" class="form-control">          
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
            <select id="selectComuna" name="selectComuna" class="form-control">
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
            <input type="text" class="form-control" id="calle" name="calle" value="{{$direccion[0]->calle}}" placeholder="" onkeypress="return (event.charCode > 64 && 
            event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" required>
        </div> 

        <div class="form-group col-md-4">
            <label for="inputAddress">Numero</label>
            <input type="number" class="form-control" id="numeroCalle" name="numeroCalle" value="{{$direccion[0]->numero}}" placeholder="" required >
        </div> 

        <div class="form-group col-md-4">
            <label for="inputAddress">Depto</label>
            <input type="text" class="form-control" id="depto" name="depto" value="{{$direccion[0]->departamento}}" placeholder="" required >
        </div> 
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>    
    <br>
    <br>
</form>



@endsection