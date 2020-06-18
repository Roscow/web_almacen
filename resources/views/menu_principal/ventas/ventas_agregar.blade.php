<!--al cambiar de direcctorio el raiz cambia-->
@extends('menu_principal/menu_ventas')


@section('contenido')
   <h1>Nueva venta</h1>   
<form action="{{route('ventas_agregar_producto')}}" method="POST">
{{ csrf_field() }}
    <div class="form-row">   
        <div class="form-group col-md-4">
            <label for="inputAddress">Codigo </label>
            <input id="codigo" name="codigo" type="number" class="form-control" id="inputAddress" placeholder=" " required>
        </div>  

        <div class="form-group col-md-4">
            <label for="inputAddress">Cantidad </label>
            <input id="cantidad" name="cantidad" type="number" class="form-control" id="inputAddress" placeholder="0" required>
        </div>  
    </div>
    <button type="submit" class="btn btn-primary">Agregar</button>
</form>
<h6>* Listado de productos</h6>
<ul class="list-group">
        <li class="list-group-item">        
            <div class="form-row">               
                <div class="form-group col-md-2">
                    <label for="inputAddress">Codigo </label>                   
                </div>

                <div class="form-group col-md-2">
                    <label for="inputAddress">Nombre </label>                   
                </div>   
                
                <div class="form-group col-md-2">
                    <label for="inputAddress">Descripcion </label>                   
                </div>   

                <div class="form-group col-md-2">
                    <label for="inputAddress">Cantidad </label>                   
                </div>                   
                <div class="form-group col-md-2">
                    <label for="inputAddress">Precio </label>                   
                </div>   
                <div class="form-group col-md-2">
                    <label for="inputAddress">Accion </label>                   
                </div>   
            </div>        
        </li>
        <li class="list-group-item">        
            <div class="form-row">               
            @foreach ( session('carrito') as $items)            
                @if(count(array($items)) > 0)
                <div class="form-group col-md-2">
                        <label for="inputAddress">{{$items[1]}}</label>                   
                    </div>

                    <div class="form-group col-md-2">
                        <label for="inputAddress">{{$items[2]}}</label>                   
                    </div>   
                    
                    <div class="form-group col-md-2">
                        <label for="inputAddress">{{$items[3]}}</label>                   
                    </div>   

                    <div class="form-group col-md-2">
                        <label for="inputAddress">{{$items[4]}}</label>                   
                    </div>               
                    <div class="form-group col-md-2">
                        <label for="inputAddress">{{$items[5]}}</label>                   
                    </div> 
                    <div class="form-group col-md-2">
                          <label for="inputAddress"><a href="{{ url('ventas_agregar_quitar/'.$items[0].'/') }}" class="btn btn-info btn-xs" role="button">Quitar</a></label>                   
                    </div>
                @endif  
            @endforeach  
            </div>        
        </li>
        <li class="list-group-item">        
            <div class="form-row">               
                <div class="form-group col-md-2">
                    <label for="inputAddress"></label>                   
                </div>

                <div class="form-group col-md-3">
                    <label for="inputAddress"></label>                   
                </div>   
                
                <div class="form-group col-md-3">
                    <label for="inputAddress"></label>                   
                </div>   

                <div class="form-group col-md-2">
                    <label for="inputAddress">Total :</label>                   
                </div>               
                <div class="form-group col-md-2">
                    <label for="inputAddress">{{session('total')}}</label>                   
                </div> 
            </div>        
        </li>
    </ul>

    <form action="{{route('ventas_agregar_confirmar')}}" method="POST">
    {{ csrf_field() }}
    <div class="form-row">

        <div class="form-group col-md-6">
                <div class="form-check col-md-4">    

                    @if(strcmp(session('type'), 'Administrador') == 0 )
                        <input class="form-check-input" type="checkbox" id="gridCheck" name="gridCheck" >
                    @else
                        <input class="form-check-input" type="checkbox" id="gridCheck" name="gridCheck" disabled >
                    @endif
                    <label class="form-check-label" for="gridCheck">
                        Fiado
                    </label>                
                   
                </div>
        </div>

        <div class="form-group col-md-6">
            <label for="inputState">Seleccione cliente</label>
            <select id="idcliente" name="idcliente" class="form-control">
            <option value="" selected>Elegir...</option>
                @foreach ($clientes as $item)
                    <option value="{{$item->rut}}"><p> {{$item->nombre1}} {{$item->nombre2}}   {{$item->apellido1}}  {{$item->apellido2}}</p></option>                   
                @endforeach
            </select>
        </div>                   
    </div>

        <button type="submit" class="btn btn-primary">Confirmar venta</button>
    </form>
@endsection


