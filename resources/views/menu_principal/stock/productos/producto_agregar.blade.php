<!--al cambiar de direcctorio el raiz cambia-->
@extends('menu_principal/menu_stock')


@section('contenido')
   <h1>Crear producto</h1>   
<form action="{{ route('insert_producto')}}" method="POST">    
@csrf    
<div class="form-row">        
        <div class="form-group col-md-4">
            <label for="inputAddress">Nombre </label>
            <input type="text" name="nombre" class="form-control" id="inputAddress" placeholder="Coca-cola" required>
        </div>
             
        <div class="form-group col-md-4">
            <label for="inputState">Seleccione tipo</label>
            <select name="tipo" id="inputState" class="form-control" required>
            <option value=""  selected>Elegir...</option>
                @foreach ($tipos as $item)
                    <option>{{$item->tipo}}</option>
                @endforeach             
            </select>
        </div>

        <div class="form-group col-md-4">
            <label for="inputState">Seleccione familia</label>
            <select name="familia" id="inputState" class="form-control" required>
                <option value="" selected>Elegir...</option>
                @foreach ($familias as $item)
                    <option>{{$item->familia}}</option>
                @endforeach         
            </select>
        </div>       
    </div> 
    
    <div class="form-row">
        <div class="form-group col-md-8">
            <label for="exampleFormControlTextarea1">Descripción</label>
            <textarea name="descripcion" class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
        </div>

        <div class="form-group col-md-4">
            <label for="inputState">Seleccione proveedor</label>
            <select name="proveedor" id="inputState" class="form-control" required>
                <option  value="" selected>Elegir...</option>
                @foreach ($proveedores as $item)
                    <option>{{$item->razon_social}}</option>
                @endforeach                  
            </select>
        </div>  
    </div>


    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputAddress">Precio de compra</label>
            <input type="number" name="precio_compra" class="form-control" id="inputAddress" placeholder="0" required>
        </div>

        <div class="form-group col-md-6">
            <label for="inputEmail4">Precio de venta</label>
            <input type="number" name="precio_venta" class="form-control" id="inputEmail4" placeholder="0" required>
        </div>           
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputAddress">Stock</label>
            <input type="number" name="stock" class="form-control" id="inputAddress" placeholder="0" required>
        </div> 

        <div class="form-group col-md-6">
            <label for="inputAddress">Stock critico</label>
            <input type="number" name="stock_critico" class="form-control" id="inputAddress" placeholder="0" required>
        </div>    
    </div>
    <button type="submit" class="btn btn-primary">Crear</button>
</form>

@endsection


