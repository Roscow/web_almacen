<!--al cambiar de direcctorio el raiz cambia-->
@extends('menu_principal/menu_ventas')


@section('contenido')
   <h1>Nueva venta</h1>   
<form>

    <div class="form-row">   
        <div class="form-group col-md-4">
            <label for="inputAddress">Codigo </label>
            <input type="text" class="form-control" id="inputAddress" placeholder=" ">
        </div>  

        <div class="form-group col-md-4">
            <label for="inputAddress">total </label>
            <input type="text" class="form-control" id="inputAddress" placeholder="0">
        </div>  
    </div>
    <button type="submit" class="btn btn-primary">agregar</button>
</form>
<h6>* listado de productos</h6>
<ul class="list-group">
        <li class="list-group-item">        
            <div class="form-row">               
                <div class="form-group col-md-4">
                    <label for="inputAddress">Coca-cola 2,5  unidades: </label>                   
                </div>

                <div class="form-group col-md-4">
                    <label for="inputAddress">Precio: $12312 </label>                   
                </div>   

            </div>        
        </li>
        <li class="list-group-item">        
            <div class="form-row">               
                <div class="form-group col-md-4">
                    <label for="inputAddress">Coca-cola 2,5  unidades: </label>                   
                </div>

                <div class="form-group col-md-4">
                    <label for="inputAddress">Precio: $12312 </label>                   
                </div>   
            </div>        
        </li>
        <li class="list-group-item">        
            <div class="form-row">               
                <div class="form-group col-md-4">
                    <label for="inputAddress">Coca-cola 2,5  unidades: </label>                   
                </div>

                <div class="form-group col-md-4">
                    <label for="inputAddress">Precio: $12312 </label>                   
                </div>   
            </div>        
        </li>
        <li class="list-group-item">        
            <div class="form-row">               
                <div class="form-group col-md-4">
                    <label for="inputAddress">Coca-cola 2,5  unidades: </label>                   
                </div>

                <div class="form-group col-md-4">
                    <label for="inputAddress">Precio: $12312 </label>                   
                </div>   
            </div>        
        </li>
        <li class="list-group-item">        
            <div class="form-row">               
                <div class="form-group col-md-4">
                    <label for="inputAddress">Coca-cola 2,5  unidades :</label>                   
                </div>

                <div class="form-group col-md-4">
                    <label for="inputAddress">Precio: $12312 </label>                   
                </div>           
            </div>        
        </li>
    </ul>

    <form>
    <div class="form-row">

        <div class="form-group col-md-6">
                <div class="form-check col-md-4">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        Fiado
                    </label>
                </div>
        </div>

        <div class="form-group col-md-6">
            <label for="inputState">Seleccione cliente</label>
            <select id="inputState" class="form-control">
                <option selected>Choose...</option>
                <option>...</option>
            </select>
        </div>                   
    </div>



       



        <button type="submit" class="btn btn-primary">confirmar venta</button>
    </form>
@endsection


