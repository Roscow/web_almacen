<!--al cambiar de direcctorio el raiz cambia-->
@extends('menu_principal/menu_cliente')

<script src="jotaese/cliente_crear.js"></script>

@section('contenido')
   <h1>Crear cliente</h1>
<form action="{{route('insert_cliente')}}" method="POST" name="forma" onsubmit=" return crearCliente()">
@csrf
    <h5>* Datos cliente</h5>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputAddress">Rut</label >
            <input type="text" name="rut" class="form-control" id="inputAddress" placeholder="17250874-k" required maxlength="12">
        </div>

        <div class="form-group col-md-6">
            <label for="inputEmail4">Telefono</label>
            <input type="text" name="telefono" class="form-control" id="inputTelefono" maxlength="9" placeholder="912345678" required onkeypress="return soloNumeros(event)" onpaste="return false">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputAddress">Primer Nombre</label>
            <input type="text" name="nombre1" class="form-control" id="inputNombre" placeholder="Jose" required onpaste="return false" onkeypress="return soloLetras(event)">
        </div>

        <div class="form-group col-md-6">
            <label for="inputAddress">Segundo Nombre</label>
            <input type="text" name="nombre2" class="form-control" id="inputNombre2" placeholder="Juan" onpaste="return false" onkeypress="return soloLetras(event)">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputAddress">Primer Apellido</label>
            <input type="text" name="apellido1" class="form-control" id="inputApellido" placeholder="Perez" required onpaste="return false" onkeypress="return soloLetras(event)">
        </div>

        <div class="form-group col-md-6">
            <label for="inputAddress">Segundo Apellido</label>
            <input type="text"name="apellido2" class="form-control" id="inputApellido2" placeholder="Figueroa" onpaste="return false" onkeypress="return soloLetras(event)">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputAddress">Correo</label>
            <input type="email" name="correo" class="form-control" id="inputCorreo" placeholder="ejemplo@correo.cl" required onpaste="return false">
        </div>

        <div class="form-group col-md-6">
            <label for="inputAddress">Fecha de nacimiento</label>
            <input type="date" name="fecha_nacimiento" class="form-control" id="inputFecha" placeholder="02/12/1988" >
        </div>
    </div>



    <h5>* Direccion</h5>
    <div class="form-row">

    <div class="form-group col-md-6">
            <label for="inputState">Region</label>
            <select id="selectRegion" name="selectRegion" class="form-control">
            <option selected>Elegir...</option>
                @foreach ($regiones as $item)
                    <option value="{{$item->id_region}}"> {{$item->region}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group col-md-6">
            <label for="inputState">Comuna</label>
            <select id="selectComuna" name="selectComuna" class="form-control" required>
            <option selected>Elegir...</option>
            <!--    @foreach ($comunas as $item)
                    <option> {{$item->comuna}}</option>
                @endforeach-->
            </select>
        </div>
    </div>

    <div class="form-row">

        <div class="form-group col-md-4">
            <label for="inputAddress">Calle</label>
            <input type="text" name="calle" class="form-control" id="inputCalle" placeholder="Esquina blanca" required onpaste="return false" onkeypress="return soloLetras(event)">
        </div>

        <div class="form-group col-md-4">
            <label for="inputAddress">Numero</label>
            <input type="text" name="numero" class="form-control" id="inputNumero" placeholder="022" required onpaste="return false" onkeypress="return soloNumeros(event)">
        </div>

        <div class="form-group col-md-4">
            <label for="inputAddress">Depto</label>
            <input type="text" name="departamento" class="form-control" id="inputDepto" placeholder="52-B" onpaste="return false">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Crear</button>
</form>

@endsection


