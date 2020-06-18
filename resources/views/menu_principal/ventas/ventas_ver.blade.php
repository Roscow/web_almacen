<!--al cambiar de direcctorio el raiz cambia-->
@extends('menu_principal/menu_ventas')


@section('contenido')
<h1>Ver Ventas </h1>
<form action="{{route('ventas_ver_detalle')}}" method="POST">
    {{ csrf_field() }}
    <div class="form-row">        
        <div class="form-group col-md-4">
            <label for="inputAddress">Fecha de creacion</label>
            <input type="date" class="form-control" id="fecha" name="fecha" placeholder="Juan">
        </div>    
    </div>
    <button type="submit" class="btn btn-primary">ir</button>  
</form>

<h6>Listado de Ventas</h6>
<ul class="list-group">
        <li class="list-group-item">        
            <div class="form-row">               
                <div class="form-group col-md-2">
                    <label for="inputAddress">Id </label>                   
                </div>

                <div class="form-group col-md-3">
                    <label for="inputAddress">Fecha </label>                   
                </div>   
                
                <div class="form-group col-md-3">
                    <label for="inputAddress">Total </label>                   
                </div>   

                <div class="form-group col-md-4">
                    <label for="inputAddress">Vendedor </label>                   
                </div>      
            </div>        
        </li>
        <li class="list-group-item">        
            <div class="form-row">
            @isset($resultado)    
              @if(count($resultado) > 0)
                @foreach ($resultado as $items)            
                  <div class="form-group col-md-2">
                          <label for="inputAddress">{{$items->id_venta}}</label>                   
                      </div>

                      <div class="form-group col-md-3">
                          <label for="inputAddress">{{$items->fecha}}</label>                   
                      </div>   
                      
                      <div class="form-group col-md-3">
                          <label for="inputAddress">{{$items->total}}</label>                   
                      </div>   

                      <div class="form-group col-md-4">
                          <label for="inputAddress">{{$items->vendedor}}</label>                   
                      </div>               
                @endforeach  
              @endif
            @endisset
            </div>        
        </li>
        <br>
        <br>
    </ul>
@endsection
