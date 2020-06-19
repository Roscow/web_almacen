<!--al cambiar de direcctorio el raiz cambia-->
@extends('menu_principal/menu_ventas')


@section('contenido')
<h1>Anular venta</h1>   
<form action="{{route('ventas_anular_detalle')}}" method="POST">
    {{ csrf_field() }}
    <div class="form-row">        
        <div class="form-group col-md-4">
            <label for="inputAddress">Fecha de creación</label>
            <input type="date" class="form-control" id="fecha" name="fecha" placeholder="Juan">
        </div>    
    </div>
    <button type="submit" class="btn btn-primary">ir</button>  
</form>

<h6>Listado de Ventas</h6>
<ul class="list-group">
        <li class="list-group-item">        
            <div class="form-row">               
                <div class="form-group col-md-1">
                    <label for="inputAddress">Id </label>                   
                </div>

                <div class="form-group col-md-4">
                    <label for="inputAddress">Fecha </label>                   
                </div>   
                
                <div class="form-group col-md-2">
                    <label for="inputAddress">Total </label>                   
                </div>   

                <div class="form-group col-md-4">
                    <label for="inputAddress">Vendedor </label>                   
                </div>

                <div class="form-group col-md-1">
                    <label for="inputAddress">Acción </label>                   
                </div>      
            </div>        
        </li>
        <li class="list-group-item">        
            <div class="form-row">
            @isset($resultado)    
              @if(count($resultado) > 0)
                @foreach ($resultado as $items)            
                  <div class="form-group col-md-1">
                          <label for="inputAddress">{{$items->id_venta}}</label>                   
                      </div>

                      <div class="form-group col-md-4">
                          <label for="inputAddress">{{$items->fecha}}</label>                   
                      </div>   
                      
                      <div class="form-group col-md-2">
                          <label for="inputAddress">{{$items->total}}</label>                   
                      </div>   

                      <div class="form-group col-md-4">
                          <label for="inputAddress">{{$items->vendedor}}</label>                   
                      </div>
                      
                      <div class="form-group col-md-1">
                          <a href="{{ url('ventas_anular_accion/'.$items->id_venta.'/'.$fecha.'/') }}" class="btn btn-info btn-xs" role="button">Anular</a>                   
                      </div>
                @endforeach  
              @endif
            @endisset
            </div>   
            <div class="form-row">     
                <br>
            </div>   
        </li>
        <br>
    </ul>
@endsection