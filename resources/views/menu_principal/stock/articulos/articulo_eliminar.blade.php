<!--al cambiar de direcctorio el raiz cambia-->
@extends('menu_principal/menu_stock')


@section('contenido')
<h1>Eliminar articulo</h1>   
    <form>    
    <div class="form-row">               
          
        <div class="form-group col-md-4">
            <label for="inputAddress">Codigo</label>
            <input type="numeric" class="form-control" id="inputAddress" placeholder="01231231">
        </div> 

    </div>
    <button type="submit" class="btn btn-primary">Eliminar</button>
    </form>
@endsection