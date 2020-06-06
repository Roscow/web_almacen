<!--al cambiar de direcctorio el raiz cambia-->
@extends('menu_principal/menu_pedidos')


@section('contenido')
   <h1>Nuevo pedido</h1>   
<form>    
    <div class="form-row">

        <div class="form-group col-md-12">
            <label for="inputState">Seleccione proveedor</label>
            <select id="inputState" class="form-control">
                <option selected>Elegir...</option>
                <option>...</option>
            </select>
        </div>

        <div class="form-group col-md-4">
            <label for="inputState">Producto</label>
            <select id="inputState" class="form-control">
                <option selected>Elegir...</option>
                <option>...</option>
            </select>
        </div>


        <div class="form-group col-md-4">
            <label for="inputAddress">Cantidad</label>
            <input type="number" class="form-control" id="inputAddress" placeholder="0">
        </div>              
    </div>
    <button type="submit" class="btn btn-primary">Agregar a lista</button> 
</form>

<form>
    <br><br>
    <h6>Pedido   actual</h6>
    <p>id:  01212 <br>proveedor: coca-cola   <br>fecha: 23-1-2122   </p>
    <ul class="list-group">
        <li class="list-group-item">Coca-cola 2,5  3 unidades</li>
        <li class="list-group-item">Coca-cola 2,5  3 unidades</li>
        <li class="list-group-item">Coca-cola 2,5  3 unidades</li>
        <li class="list-group-item">Coca-cola 2,5  3 unidades</li>
        <li class="list-group-item">Coca-cola 2,5  3 unidades</li>
    </ul>


    <button type="submit" class="btn btn-primary">Enviar pedido</button> 
</form>

@endsection


