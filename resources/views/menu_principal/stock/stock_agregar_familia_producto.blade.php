<!--al cambiar de direcctorio el raiz cambia-->
@extends('menu_principal/menu_stock')


@section('contenido')
<h1>nueva familia de producto</h1>   
<form>     
            <div class="form-row">            
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Familia</label>
                    <input type="text" class="form-control" id="inputEmail4">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Agregar</button>
            
      </form>
@endsection