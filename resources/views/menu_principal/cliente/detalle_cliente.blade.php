
@extends('menu_principal/cliente/cliente_fiados')

@section('detalle')
<p>Monto Adeudado Actual : <strong style="color:red">{{$monto_actual}}</strong> </p>
<div class="accordion" id="accordionExample">

  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Historial de Fiados
        </button>
      </h2>
    </div>

    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">

          <div class="list-group-item pr-div">
              <div class="form-row">
                  <div class="form-group col-md-4">
                      <label for="inputAddress"><h6>Fecha Emision</h6> </label>
                  </div>

                  <div class="form-group col-md-4">
                      <label for="inputAddress"><h6>Codigo Venta </h6></label>
                  </div>

                  <div class="form-group col-md-4">
                      <label for="inputAddress"><h6>Monto Fiado</h6> </label>
                  </div>
              </div>
          </div>
          <div class="list-group-item pr-div">
              @isset($fiados)
                @if(count($fiados) > 0)
                  @foreach ($fiados as $item)
                  <div class="form-row">
                      <div class="form-group col-md-4">
                              <label for="inputAddress">{{$item->fecha_fiado}}</label>
                          </div>

                          <div class="form-group col-md-4">
                              <label for="inputAddress">{{$item->id_venta}}</label>
                          </div>

                          <div class="form-group col-md-4">
                              <label for="inputAddress"> <strong style="color:red"> $ {{$item->total_fiado}}</strong></label>
                          </div>
                    </div>
                  @endforeach
                @endif
              @endisset
          </div>
      </div>
    </div>
  </div>


  <div class="card">
    <div class="card-header" id="headingTwo">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Historial de Abonos
        </button>
      </h2>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
      <!--seccion de agregar abono-->

      <form action="{{route('abonar')}}" method="POST" >
      @csrf
      <h6>* Agregar Abono</h6>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputEmail4">Monto</label>
                    <input type="number" name="monto" class="form-control" min="1" id="inputEmail4">
                </div>

                <input type="hidden" id="rut" name="rut" value="{{$rut}}">
                <input type="hidden" id="fecha" name="fecha" value="">

            </div>
            <button type="submit" class="btn btn-primary">Abonar</button>

      </form>
      <br>
            <h6>* Historial de Abonos</h6>

            <div class="list-group-item pr-div">
              <div class="form-row">
                  <div class="form-group col-md-6">
                      <label for="inputAddress"><h6>Fecha Emision</h6></label>
                  </div>
                  <div class="form-group col-md-6">
                      <label for="inputAddress"><h6>Monto Abono</h6> </label>
                  </div>
              </div>
          </div>
          <div class="list-group-item pr-div">
              @isset($abonos)
                @if(count($abonos) > 0)
                  @foreach ($abonos as $item)
                  <div class="form-row">
                      <div class="form-group col-md-6">
                          <label for="inputAddress">{{$item->fecha_pago}}</label>
                      </div>

                      <div class="form-group col-md-6">
                          <label for="inputAddress"><strong style="color:blue"> $ {{$item->monto}}</strong></label>
                      </div>
                    </div>
                  @endforeach
                @endif
              @endisset
          </div>
      </div>
    </div>
  </div>
  <br>
</div>
@endsection
