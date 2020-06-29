<!--al cambiar de direcctorio el raiz cambia-->
@extends('menu_principal/menu_usuario')



@section('contenido')
<h1> Ver usuarios  </h1>
<div class="accordion" id="accordionExample">
<!--mostrando rubros en acordion-->
@foreach ($usuarios as $elemento)

  <div class="card">
    <div class="card-header" id="heading{{$elemento->id_user}}">
      <h2 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{$elemento->id_user}}" aria-expanded="true" aria-controls="collapseOne">
          <!--<p> {{$elemento->nombre1}} {{$elemento->nombre2}} {{$elemento->apellido1}} {{$elemento->apellido2}}</p>-->
          <p>{{str_replace("_", " ",$elemento->nombre1)}} {{str_replace("_", " ",$elemento->nombre2)}} {{str_replace("_", " ",$elemento->apellido1)}} {{str_replace("_", " ",$elemento->apellido2)}} </p> 
        </button>
      </h2>
      <br>

    </div>

    <div id="collapse{{$elemento->id_user}}" class="collapse" aria-labelledby="heading{{$elemento->id_user}} data-parent="#accordionExample">
      <div class="card-body">
      <p>id: {{$elemento->id_user}}<br>
      Rut: {{$elemento->rut}} - {{$elemento->dv}}<br>
      Correo: {{$elemento->correo}}<br>
      Telefono: {{$elemento->telefono}}<br>
      Tipo_usuario:       
      @if ($elemento->id_tipo_user == 0)
         Administrador 
      @else
          Vendedor
      @endif
   
      <br>
      Fecha Nacimiento: {{$elemento->fecha_nacimiento}}
      </p>
      </div>
    </div>
  </div>


@endforeach


</div>
<br>
@endsection
