<!--al cambiar de direcctorio el raiz cambia-->
@extends('menu_principal/menu_proveedor')


@section('contenido')
<h1>Nuevo rubro de proveedor</h1>   
<form action="{{route('nuevo_rubro')}}" method="POST" >  
@csrf  
            <div class="form-row">            
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Rubro</label>
                    <input type="text" name="rubro" class="form-control" id="inputEmail4" required >
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Agregar</button>
            
      </form>
@endsection