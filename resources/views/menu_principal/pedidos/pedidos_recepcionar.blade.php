<!--al cambiar de direcctorio el raiz cambia-->
@extends('menu_principal/menu_pedidos')


@section('contenido')
   <h1>Recepcionar pedido</h1>   
<form>    
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="inputState">Seleccione pedido</label>
            <select id="inputState" class="form-control">
                <option selected>Elegir...</option>
                <option>...</option>
            </select>
        </div>                   
    </div>
    <button type="submit" class="btn btn-primary">abrir</button> 
</form>

<form>
    <br><br>
    <h6>Pedido   actual</h6>
    <p>id:  01212 <br>proveedor: coca-cola   <br>fecha: 23-1-2122   </p>
    <ul class="list-group">
        <li class="list-group-item">        
            <div class="form-row">               
                <div class="form-group col-md-4">
                    <label for="inputAddress">Coca-cola 2,5  unidades: </label>                   
                </div>

                <div class="form-group col-md-4">                   
                    <input type="text" class="form-control" id="inputAddress" placeholder="0">
                </div>

                <div class="form-group">
                <div class="form-check col-md-4">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        revisado
                    </label>
                </div>
                </div>
            </div>        
        </li>
        <li class="list-group-item">        
            <div class="form-row">               
                <div class="form-group col-md-4">
                    <label for="inputAddress">Coca-cola 2,5  unidades: </label>                   
                </div>

                <div class="form-group col-md-4">                   
                    <input type="text" class="form-control" id="inputAddress" placeholder="0">
                </div>

                <div class="form-group">
                <div class="form-check col-md-4">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        revisado
                    </label>
                </div>
                </div>
            </div>        
        </li>
        <li class="list-group-item">        
            <div class="form-row">               
                <div class="form-group col-md-4">
                    <label for="inputAddress">Coca-cola 2,5  unidades: </label>                   
                </div>

                <div class="form-group col-md-4">                   
                    <input type="text" class="form-control" id="inputAddress" placeholder="0">
                </div>

                <div class="form-group">
                <div class="form-check col-md-4">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        revisado
                    </label>
                </div>
                </div>
            </div>        
        </li>
        <li class="list-group-item">        
            <div class="form-row">               
                <div class="form-group col-md-4">
                    <label for="inputAddress">Coca-cola 2,5  unidades: </label>                   
                </div>

                <div class="form-group col-md-4">                   
                    <input type="text" class="form-control" id="inputAddress" placeholder="0">
                </div>

                <div class="form-group">
                <div class="form-check col-md-4">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        revisado
                    </label>
                </div>
                </div>
            </div>        
        </li>
        <li class="list-group-item">        
            <div class="form-row">               
                <div class="form-group col-md-4">
                    <label for="inputAddress">Coca-cola 2,5  unidades :</label>                   
                </div>

                <div class="form-group col-md-4">                   
                    <input type="text" class="form-control" id="inputAddress" placeholder="0">
                </div>

                <div class="form-group">
                <div class="form-check col-md-4">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        revisado
                    </label>
                </div>
                </div>
            </div>        
        </li>
    </ul>


    <button type="submit" class="btn btn-primary">Finalizar recepcion</button> 
</form>

@endsection
