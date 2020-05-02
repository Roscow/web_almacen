<!--al cambiar de direcctorio el raiz cambia-->
@extends('menu_principal/menu_cliente')


@section('contenido')
<h1>ver fiados </h1>
<form>
    <div class="form-row">        
        <div class="form-group col-md-4">
            <label for="inputState">Seleccione cliente </label>
            <select id="inputState" class="form-control">
                <option selected>Choose...</option>
                <option>...</option>
            </select>
        </div>    
    </div>
</form>



<p>monto adeudado actual:  $_monto_</p>
<div class="accordion" id="accordionExample">

  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Historial de fiados
        </button>
      </h2>
    </div>

    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
            ejemplo:<br>
            fecha:13-05-2019      monto: $15900     deuda: 21900<br><br>
            fecha:13-05-2019      monto: $15900     deuda: 21900<br><br>
            fecha:13-05-2019      monto: $15900     deuda: 21900<br><br>
            fecha:13-05-2019      monto: $15900     deuda: 21900<br><br>
            fecha:18-07-2017      monto: $1212      deuda: 13900
      </div>
    </div>
  </div>


  <div class="card">
    <div class="card-header" id="headingTwo">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Historial de abonos
        </button>
      </h2>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
      <!--seccion de agregar abono-->
      <form>
      <h6>* agregar abono</h6>
            <div class="form-row">            
                <div class="form-group col-md-4">
                    <label for="inputEmail4">Monto</label>
                    <input type="number" class="form-control" id="inputEmail4">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Abonar</button>
            
      </form>
      <br><br>
            <h6>* historial de abonos</h6>
            <p>
            fecha:13-05-2019      monto: $15900     deuda: 21900<br><br>
            fecha:13-05-2019      abono: $15900     deuda: 21900<br><br>
            fecha:13-05-2019      abono: $15900     deuda: 21900<br><br>
            fecha:13-05-2019      abono: $15900     deuda: 21900<br><br>
            fecha:18-07-2017      abono: $1212      deuda: 13900
            </p>
      </div>
    </div>
  </div>


  <div class="card">
    <div class="card-header" id="headingThree">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            todos los movimientos
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
