
@extends('menu_principal/stock/productos/producto_modificar')



@section('edicion_producto')
<form action="{{route('actualizar_producto')}}" method="POST">
{{ csrf_field() }}

    <div class="form-row">               
        <div class="form-group col-md-4">
            <label  for="inputAddress">Editando: {{$producto[0]->nombre}} </label>  
            <input type="hidden" name="prod" class="form-control" id="inputAddress" value="{{$producto[0]->nombre}}" required>                     
        </div>
    </div>

    <div class="form-row">               
        <div class="form-group col-md-4">
            <label for="inputAddress">Nombre </label>            
            <input type="text" name="nombre" class="form-control" id="inputAddress" value="{{$producto[0]->nombre}}" required>
        </div>
             
        <div class="form-group col-md-4">
            <label for="inputState">Seleccione tipo</label>
            <select id="inputState" name="tipo" class="form-control" required>
                <option  value="" selected>Elegir...</option>
                @foreach ($tipos as $item)
                    @if($item->id_tipo == $producto[0]->id_tipo )
                        <option value="{{$item->tipo}}" selected> {{$item->tipo}}</option>
                    @else
                        <option value="{{$item->tipo}}"> {{$item->tipo}}</option>
                    @endif
                @endforeach


                   
            </select>
        </div>

        <div class="form-group col-md-4">
            <label for="inputState">Seleccione familia</label>
            <select id="inputState" name="familia" class="form-control" required>   
                <option  value="" selected>Elegir...</option>           
                @foreach ($familias as $item)
                    @if($item->id_familia == $producto[0]->id_familia )
                        <option value="{{$item->familia}}" selected> {{$item->familia}}</option>
                    @else
                        <option value="{{$item->familia}}"> {{$item->familia}}</option>
                    @endif
                @endforeach
            </select>
        </div>       
    </div> 
    
    <div class="form-row">
        <div class="form-group col-md-8">
            <label for="exampleFormControlTextarea1">Descripcion</label>
            <textarea name="descripcion" class="form-control" id="exampleFormControlTextarea1" rows="3" required>{{$producto[0]->descripcion}}</textarea>
        </div>

        <div class="form-group col-md-4">
            <label for="inputState">Seleccione proveedor</label>
            <select id="inputState" name="proveedor" class="form-control" required>
                <option  value="" selected>Elegir...</option>
                @foreach ($proveedores as $item)
                    @if($item->rut_empresa == $producto[0]->rut_empresa )
                        <option value="{{$item->razon_social}}" selected> {{$item->razon_social}}</option>
                    @else
                        <option value="{{$item->razon_social}}"> {{$item->razon_social}}</option>
                    @endif
                @endforeach               
            </select>
        </div>  
    </div>


    <div class="form-row">
        <div class="form-group col-md-6">
            
            <label for="inputAddress">precio de compra</label>
            @if(strcmp(session('type'), 'Administrador') == 0 )
                <input type="number" name="precio_compra" class="form-control" id="inputAddress" value="{{$producto[0]->precio_compra}}" required>
            @else
                <input type="number" name="precio_compra" class="form-control" id="inputAddress" value="{{$producto[0]->precio_compra}}" disabled required>
            @endif
            
        </div>

        <div class="form-group col-md-6">
            <label for="inputEmail4">Precio de venta</label>
            @if(strcmp(session('type'), 'Administrador') == 0 )
                <input type="number" name="precio_venta" class="form-control" id="inputEmail4" value="{{$producto[0]->precio_venta}}" required>
            @else
                <input type="number" name="precio_venta" class="form-control" id="inputEmail4" value="{{$producto[0]->precio_venta}}" disabled required>
            @endif
            
        </div>           
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputAddress">stock</label>
            <input type="number" name="stock" class="form-control" id="inputAddress" value="{{$producto[0]->stock}}" required>
        </div> 

        <div class="form-group col-md-6">
            <label for="inputAddress">stock critico</label>
            <input type="number" name="stock_critico" class="form-control" id="inputAddress"value="{{$producto[0]->stock_critico}}" required>
        </div>         
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>   
</form>

    @endsection