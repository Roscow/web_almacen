<!--al cambiar de direcctorio el raiz cambia-->
@extends('menu_principal/menu_stock')


@section('contenido')
<h1>Nueva familia de producto</h1>   
<form action="{{ route('insert_familia_producto')}}" method="POST">     
@csrf 
            <div class="form-row">            
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Familia</label>
                    <input type="text" name="familia" class="form-control" id="inputEmail4" required >
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Agregar</button>
            
      </form>
@endsection