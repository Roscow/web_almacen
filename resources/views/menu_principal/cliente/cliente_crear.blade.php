<!--al cambiar de direcctorio el raiz cambia-->
@extends('menu_principal/menu_cliente')


@section('contenido')
   <h1>crear cliente</h1>   
<form action="{{route('insert_cliente')}}" method="POST">
@csrf
    <h5>* datos cliente</h5>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputAddress">Rut</label >
            <input type="text" name="rut" class="form-control" id="inputAddress" placeholder="17250874-k" required>
        </div>

        <div class="form-group col-md-6">
            <label for="inputEmail4">Telefono</label>
            <input type="number" name="telefono" class="form-control" id="inputEmail4" placeholder="1231231231" required>
        </div>           
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputAddress">Primer Nombre</label>
            <input type="text" name="nombre1" class="form-control" id="inputAddress" placeholder="Jose" required>
        </div> 

        <div class="form-group col-md-6">
            <label for="inputAddress">Segundo Nombre</label>
            <input type="text" name="nombre2" class="form-control" id="inputAddress" placeholder="jose">
        </div>    
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputAddress">Primer Apellido</label>
            <input type="text" name="apellido1" class="form-control" id="inputAddress" placeholder="Perez" required>
        </div> 

        <div class="form-group col-md-6">
            <label for="inputAddress">Segundo Apellido</label>
            <input type="text"name="apellido2" class="form-control" id="inputAddress" placeholder="Figueroa">
        </div>    
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputAddress">Correo</label>
            <input type="email" name="correo" class="form-control" id="inputAddress" placeholder="ejemplo@correo.cl" required>        
        </div>    

        <div class="form-group col-md-6">
            <label for="inputAddress">Fecha de nacimiento</label>
            <input type="date" name="fecha_nacimiento" class="form-control" id="inputAddress" placeholder="02/12/1988">
        </div>
    </div>



    <h5>* direccion</h5>
    <div class="form-row">

    <div class="form-group col-md-6">
            <label for="inputState">Region</label>
            <select id="selectRegion" class="form-control">
            <option selected>Elegir...</option>               
                @foreach ($regiones as $item)
                    <option value="{{$item->id_region}}"> {{$item->region}}</option>                   
                @endforeach
            </select>
        </div>

        <div class="form-group col-md-6">
            <label for="inputState">Comuna</label>
            <select id="selectComuna" class="form-control">
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
            <input type="text" name="calle" class="form-control" id="inputAddress" placeholder="esquina blanca" required>
        </div> 

        <div class="form-group col-md-4">
            <label for="inputAddress">Numero</label>
            <input type="number" name="numero" class="form-control" id="inputAddress" placeholder="022" required>
        </div> 

        <div class="form-group col-md-4">
            <label for="inputAddress">Depto</label>
            <input type="text" name="departamento" class="form-control" id="inputAddress" placeholder="52-b">
        </div>   
    </div>
    <button type="submit" class="btn btn-primary">Crear</button>
</form>

@endsection


