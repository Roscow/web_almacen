<!--al cambiar de direcctorio el raiz cambia-->
@extends('menu_principal/menu_ventas')


@section('contenido')
<h1>Anular venta</h1>   
    <form>    
    <div class="form-row">        
    <div class="form-group col-md-4">
            <label for="inputAddress">Codigo</label>
            <input type="numeric" class="form-control" id="inputAddress" placeholder=" ">
        </div>    
    </div>
    <button type="submit" class="btn btn-primary">Anular</button>
    </form>
@endsection