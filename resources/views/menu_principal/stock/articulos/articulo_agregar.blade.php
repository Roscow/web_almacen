<!--al cambiar de direcctorio el raiz cambia-->
@extends('menu_principal/menu_stock')


@section('contenido')
<h1>Agregar articulo</h1>   
<form action="{{ route('insert_articulo')}}" method="POST">    
@csrf
    <div class="form-row">        
        <div class="form-group col-md-4">
            <label for="inputState">Seleccione producto </label>
            <select name="producto" id="inputState" class="form-control">
                <option selected>Elegir...</option>
                @foreach ($productos as $item)
                    <option>{{$item->nombre}}</option>
                @endforeach 
            </select>
        </div>    

        <div class="form-group col-md-4">
            <label for="inputAddress">Fecha de vencimiento</label>
            <input type="date" name="vencimiento" class="form-control" id="inputAddress" placeholder="esquina blanca">
        </div> 

        <div class="form-group col-md-4">
            <label for="inputAddress">Cantidad</label>
            <input name="cantidad" type="numeric" class="form-control" id="inputAddress" placeholder="0">
        </div> 

    </div>
    <button type="submit" class="btn btn-primary">Agregar</button>
    </form>
@endsection