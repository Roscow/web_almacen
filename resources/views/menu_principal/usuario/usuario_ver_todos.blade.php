<!--al cambiar de direcctorio el raiz cambia-->
@extends('menu_principal/menu_usuario')



@section('contenido')
<h1> ver usuarios  </h1>
<div class="accordion" id="accordionExample">
<!--mostrando rubros en acordion-->
@foreach ($usuarios as $elemento)

  <div class="card">
    <div class="card-header" id="heading{{$elemento->id_user}}">
      <h2 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{$elemento->id_user}}" aria-expanded="true" aria-controls="collapseOne">
          <p> {{$elemento->nombre1}} {{$elemento->nombre2}} {{$elemento->apellido1}} {{$elemento->apellido2}}</p>
        </button>
      </h2>
    </div>

    <div id="collapse{{$elemento->id_user}}" class="collapse" aria-labelledby="heading{{$elemento->id_user}} data-parent="#accordionExample">
      <div class="card-body">
      <p>id: {{$elemento->id_user}}<br>
      Rut: {{$elemento->rut}} - {{$elemento->dv}}<br>
      Correo: {{$elemento->correo}}<br>
      Telefono: {{$elemento->telefono}}<br>
      Tipo_usuario: {{$elemento->id_tipo_user}}<br>
      Fecha Nacimiento: {{$elemento->fecha_nacimiento}}
      </p>
      </div>
    </div>
  </div>


@endforeach

<!-- el ejemplo 
  <div class="card">
    <div class="card-header" id="heading{{$elemento->id}}">
      <h2 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{$elemento->id}}" aria-expanded="true" aria-controls="collapseOne">
          Nombre_usuario1
        </button>
      </h2>
    </div>

    <div id="collapse{{$elemento->id}}" class="collapse show" aria-labelledby="heading{{$elemento->id}}" data-parent="#accordionExample">
      <div class="card-body">
      detalles del usuario
      </div>
    </div>
  </div>



  <div class="card">
    <div class="card-header" id="headingTwo">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Nombre_usuario2
        </button>
      </h2>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
            detalles del usuario
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            Nombre_usuario3
        </button>
      </h2>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
            detalles del usuario
      </div>
    </div>
  </div>
</div>
-->
</div>
@endsection
