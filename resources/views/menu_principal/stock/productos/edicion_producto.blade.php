
@extends('menu_principal/stock/productos/producto_modificar')



@section('edicion_producto')
    <div class="form-row">        
        <div class="form-group col-md-4">
            <label for="inputAddress">Nombre </label>
            <input type="text" class="form-control" id="inputAddress" placeholder="coca-cola">
        </div>
             
        <div class="form-group col-md-4">
            <label for="inputState">Seleccione tipo</label>
            <select id="inputState" class="form-control">
            <option selected>Elegir...</option>
                @foreach ($tipo as $item)
                    <option>{{$item->tipo}}</option>
                @endforeach 
            </select>
        </div>

        <div class="form-group col-md-4">
            <label for="inputState">Seleccione familia</label>
            <select id="inputState" class="form-control">
            <option selected>Elegir...</option>
                @foreach ($familia as $item)
                    <option>{{$item->familia}}</option>
                @endforeach  
            </select>
        </div>       
    </div> 
    
    <div class="form-row">
        <div class="form-group col-md-8">
            <label for="exampleFormControlTextarea1">Descripcion</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>

        <div class="form-group col-md-4">
            <label for="inputState">Seleccione proveedor</label>
            <select id="inputState" class="form-control">
                <option selected>Elegir...</option>
                @foreach ($proveedores as $item)
                    <option>{{$item->razon_social}}</option>
                @endforeach                
            </select>
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
    <button type="submit" class="btn btn-primary">Guardar cambios</button>

    @endsection