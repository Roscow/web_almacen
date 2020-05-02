<!--al cambiar de direcctorio el raiz cambia-->
@extends('menu_principal/menu_stock')


@section('contenido')
   <h1>crear producto</h1>   
<form>
    <div class="form-row">        
        <div class="form-group col-md-4">
            <label for="inputAddress">Nombre </label>
            <input type="text" class="form-control" id="inputAddress" placeholder="coca-cola">
        </div>
             
        <div class="form-group col-md-4">
            <label for="inputState">Seleccione tipo</label>
            <select id="inputState" class="form-control">
                <option selected>Choose...</option>
                <option>...</option>
            </select>
        </div>

        <div class="form-group col-md-4">
            <label for="inputState">Seleccione familia</label>
            <select id="inputState" class="form-control">
                <option selected>Choose...</option>
                <option>...</option>
            </select>
        </div>       
    </div> 
    
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="exampleFormControlTextarea1">Descripcion</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
    </div>


    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputAddress">precio de compra</label>
            <input type="number" class="form-control" id="inputAddress" placeholder="0">
        </div>

        <div class="form-group col-md-6">
            <label for="inputEmail4">Precio de venta</label>
            <input type="number" class="form-control" id="inputEmail4" placeholder="0">
        </div>           
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputAddress">stock</label>
            <input type="number" class="form-control" id="inputAddress" placeholder="0">
        </div> 

        <div class="form-group col-md-6">
            <label for="inputAddress">stock critico</label>
            <input type="number" class="form-control" id="inputAddress" placeholder="0">
        </div>    
    </div>
    <button type="submit" class="btn btn-primary">Crear</button>
</form>

@endsection


