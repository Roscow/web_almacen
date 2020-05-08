<!--al cambiar de direcctorio el raiz cambia-->
@extends('menu_principal/menu_cliente')


@section('contenido')
   <h1>crear cliente</h1>   
<form>
    <h5>* datos cliente</h5>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputAddress">Rut</label >
            <input type="number" class="form-control" id="inputAddress" placeholder="17250874-k" required>
        </div>

        <div class="form-group col-md-6">
            <label for="inputEmail4">Telefono</label>
            <input type="number" class="form-control" id="inputEmail4" placeholder="1231231231" required>
        </div>           
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputAddress">Primer Nombre</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="Jose" required>
        </div> 

        <div class="form-group col-md-6">
            <label for="inputAddress">Segundo Nombre</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="Juan">
        </div>    
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputAddress">Primer Apellido</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="Perez" required>
        </div> 

        <div class="form-group col-md-6">
            <label for="inputAddress">Segundo Apellido</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="Figueroa">
        </div>    
    </div>



    <h5>* direccion</h5>
    <div class="form-row">

        <div class="form-group col-md-6">
            <label for="inputState">Region</label>
            <select id="inputState" class="form-control">
                <option selected>Choose...</option>
                <option>...</option>
            </select>
        </div>

        <div class="form-group col-md-6">
            <label for="inputState">Comuna</label>
            <select id="inputState" class="form-control">
                <option selected>Choose...</option>
                <option>...</option>
            </select>
        </div>
    </div>

    <div class="form-row">

        <div class="form-group col-md-4">
            <label for="inputAddress">Calle</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="esquina blanca" required>
        </div> 

        <div class="form-group col-md-4">
            <label for="inputAddress">Numero</label>
            <input type="number" class="form-control" id="inputAddress" placeholder="022" required>
        </div> 

        <div class="form-group col-md-4">
            <label for="inputAddress">Depto</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="52-b">
        </div>   
    </div>
    <button type="submit" class="btn btn-primary">Crear</button>
</form>

@endsection


