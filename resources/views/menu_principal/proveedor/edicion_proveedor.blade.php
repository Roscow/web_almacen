
@extends('menu_principal/proveedor/proveedor_editar')


@section('edicion_proveedor')

<h5>* datos proveedor</h5>
<form action="{{route('actulizar_proveedor')}}" method="POST">
{{ csrf_field() }}

    <div class="form-row">
        <input type="hidden" id="rut_empresa" name="rut_empresa" value="{{$proveedores[0]->rut_empresa}}">
   
        <div class="form-group col-md-6">        
            <label for="inputEmail4">Razon social (nombre)</label>
            <input type="text" class="form-control" id="razon_social" name="razon_social" value="{{$proveedores[0]->razon_social}}" placeholder="Coca-cola">
        </div>    
        
        <div class="form-group col-md-6">
            <label for="inputAddress">telefono</label>
            <input type="numeric" class="form-control" id="telefono" name="telefono" value="{{$proveedores[0]->telefono}}" placeholder="123123123">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputAddress">Correo</label>
            <input type="email" class="form-control" id="correo" name="correo" value="{{$proveedores[0]->correo}}" placeholder="Juan@elcancer.cl">
        </div>  
        
        <div class="form-group col-md-6">
            <label for="inputAddress">Codigo postal</label>
            <input type="numeric" class="form-control" id="codigo_postal" name="codigo_postal" value="{{$proveedores[0]->codigo_postal}}" placeholder="Juan">
        </div>
    </div>


    <div class="form-row">

        <div class="form-group col-md-6">
            <label for="inputState">Rubro</label>
            <select id="selectRubro" name="selectRubro" class="form-control">
            <option selected>Elegir...</option>               
                @foreach ($rubros as $item)
                    @if($item->id === $proveedores[0]->id_rubro){
                         <option value="{{$item->id}}" selected> <?php echo strtolower($item->rubro)?></option>   
                    @else
                         <option value="{{$item->id}}"> <?php echo strtolower($item->rubro)?></option> 
                    @endif                          
                @endforeach
            </select>
        </div>   


    </div>

    <div class="form-row">    
        <div class="form-group col-md-12">
            <label for="inputAddress">Nombre contacto</label>
            <input type="text" class="form-control" id="nombre_contacto" name="nombre_contacto" value="{{$proveedores[0]->nombre_contacto}}" placeholder="Juan carlos ">
        </div>    
    </div>

    <h5>* Direccion</h5>
    <div class="form-row">

        <div class="form-group col-md-6">
            <label for="inputState">Region</label>
            <select id="selectRegion" name="selectRegion" class="form-control">
            <option selected>Elegir...</option>               
                @foreach ($regiones as $item)
                        @if($item->id_region === $region[0]->id_region){
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
            <option selected>Elegir...</option>       
                @foreach ($comunas as $item)
                        @if($item->id_comuna === $comuna[0]->id_comuna)  {
                            <option value=" {{$item->id_comuna}}" selected> {{$item->comuna}}</option> 
                        @else
                            <option value=" {{$item->id_comuna}}"> {{$item->comuna}}</option> 
                        @endif
                                      
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-row">

        <div class="form-group col-md-4">
            <label for="inputAddress">Calle</label>
            <input type="text" class="form-control" id="calle" name="calle" value="{{$direccion[0]->calle}}" placeholder="Esquina blanca">
        </div> 

        <div class="form-group col-md-4">
            <label for="inputAddress">Numero</label>
            <input type="number" class="form-control" id="numero" name="numeroCalle" value="{{$direccion[0]->numero}}" placeholder="022">
        </div> 

        <div class="form-group col-md-4">
            <label for="inputAddress">Depto</label>
            <input type="text" class="form-control" id="depto" name="depto" value="{{$direccion[0]->departamento}}" placeholder="52-b">
        </div> 
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@endsection