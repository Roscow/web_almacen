
@extends('menu_principal/cliente/cliente_fiados')

@section('detalle')
<p>monto adeudado actual: <strong style="color:red">{{$monto_actual}}</strong> </p>
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
           
      <p> 
            @foreach ($fiados as $item)
                Fecha: {{$item->fecha_fiado}} Id venta:  {{$item->id_venta}}  Monto:$ <strong style="color:red">{{$item->total_fiado}}</strong> <br>
            @endforeach           
            </p>
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
      
      <form action="{{route('abonar')}}" method="POST" >
      @csrf  
      <h6>* agregar abono</h6>
            <div class="form-row">            
                <div class="form-group col-md-4">
                    <label for="inputEmail4">Monto</label>
                    <input type="number" name="monto" class="form-control" id="inputEmail4">
                </div>

                <input type="hidden" id="rut" name="rut" value="{{$rut}}">
                <input type="hidden" id="fecha" name="fecha" value="">

            </div>
            <button type="submit" class="btn btn-primary">Abonar</button>
            
      </form>
      <br><br>
            <h6>* historial de abonos</h6>
            <p> 
            @foreach ($abonos as $item)
                Fecha: {{$item->fecha_pago}}  Monto:$ <strong style="color:blue">{{$item->monto}}</strong> <br>
            @endforeach           
            </p>
      </div>
    </div>
  </div>

<!--
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
  -->
</div>
@endsection