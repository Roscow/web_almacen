<!--al cambiar de direcctorio el raiz cambia-->
@extends('menu_principal/menu_stock')


@section('contenido')
<h1>nuevo tipo de producto</h1>   
<form action="{{ route('insert_tipo_producto')}}" method="POST">     
        @csrf
            <div class="form-row">            
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Tipo de producto</label>
                    <input type="text" name="tipo" class="form-control" id="inputEmail4">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Agregar</button>
            
</form>
@endsection