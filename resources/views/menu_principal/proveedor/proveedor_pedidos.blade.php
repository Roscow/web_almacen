<!--al cambiar de direcctorio el raiz cambia-->
@extends('menu_principal/menu_proveedor')


@section('contenido')
<h1>pedidos </h1>
<form>
    <div class="form-row">        
        <div class="form-group col-md-4">
            <label for="inputState">Seleccione proveedor </label>
            <select id="inputState" class="form-control">
                <option selected>Choose...</option>
                <option>...</option>
            </select>
        </div>    
    </div>
</form>


<div class="accordion" id="accordionExample">

  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                 29-03-2020
        </button>
      </h2>
    </div>

    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
      <br><br>
            <h6>* detalle del pedido</h6>
            <p>
           coca-light    2,5 litros    cantidad 3     monto: $15900     deuda: 21900<br><br>
           coca-light    2,5 litros    cantidad 3     monto: $15900     deuda: 21900<br><br>
           coca-light    2,5 litros    cantidad 3     monto: $15900     deuda: 21900<br><br>
           coca-light    2,5 litros    cantidad 3     monto: $15900     deuda: 21900<br><br>
           coca-light    2,5 litros    cantidad 3     monto: $15900     deuda: 21900<br><br>     
      </div>
    </div>
  </div>


  <div class="card">
    <div class="card-header" id="headingTwo">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            29-04-2020
        </button>
      </h2>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">       
      <br><br>
            <h6>* detalle del pedido</h6>
            <p>
           coca-light    2,5 litros    cantidad 3     monto: $15900     deuda: 21900<br><br>
           coca-light    2,5 litros    cantidad 3     monto: $15900     deuda: 21900<br><br>
           coca-light    2,5 litros    cantidad 3     monto: $15900     deuda: 21900<br><br>
           coca-light    2,5 litros    cantidad 3     monto: $15900     deuda: 21900<br><br>
           coca-light    2,5 litros    cantidad 3     monto: $15900     deuda: 21900<br><br>     
      </div>
    </div>
  </div>


  <div class="card">
    <div class="card-header" id="headingThree">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            29-05-2020
        </button>
      </h2>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">      
            fecha:13-05-2019    abono    monto: $15900     deuda: 21900<br><br>
            fecha:13-05-2019    fiado    monto: $15900     deuda: 21900<br><br>
            fecha:13-05-2019    abono    monto: $15900     deuda: 21900<br><br>
            fecha:13-05-2019    abono    monto: $15900     deuda: 21900<br><br>
            fecha:13-05-2019    fiado    monto: $15900     deuda: 21900<br><br>
            fecha:13-05-2019    abono    monto: $15900     deuda: 21900<br><br>
            fecha:13-05-2019    fiado    monto: $15900     deuda: 21900<br><br>
            fecha:18-07-2017    abono    monto: $1212      deuda: 13900
      </div>
    </div>
  </div>
</div>
@endsection
