<!--al cambiar de direcctorio el raiz cambia-->
@extends('menu_principal/menu_proveedor')


@section('contenido')
   <h1>Crear proveedor</h1>   
<form>
    <h5>* Datos proveedor</h5>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputAddress">Rut empresa</label>
            <input type="text" name="rut_empresa" class="form-control" id="inputAddress" placeholder="17250874-k" required>
        </div>

        <div class="form-group col-md-6">
            <label for="inputEmail4">Razon social (nombre)</label>
            <input type="text" name="razon_social" class="form-control" id="inputEmail4" placeholder="Coca-cola">
        </div>           
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputAddress">telefono</label>
            <input type="numeric" name="telefono" class="form-control" id="inputAddress" placeholder="123123123" required>
        </div> 

        <div class="form-group col-md-6">
            <label for="inputAddress">Correo</label>
            <input type="email" name="correo" class="form-control" id="inputAddress" placeholder="Juan@elcancer.cl" required>
        </div>    
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputAddress">Codigo postal</label>
            <input type="number" name="codigo_postal" class="form-control" id="inputAddress" placeholder="9273353">
        </div> 

        <div class="form-group col-md-6">
            <label for="inputState">Rubro</label>
            <select id="inputState" class="form-control">
            <option selected>Elegir...</option>               
                @foreach ($rubros as $item)
                    <option> {{$item->rubro}}</option>                   
                @endforeach            
            </select>
        </div>   
    </div>

    <div class="form-row">        
        <div class="form-group col-md-12">
            <label for="inputAddress">Nombre contacto</label>
            <input type="text" name="nombre_contacto" class="form-control" id="inputAddress" placeholder="Juan carlos " required>
        </div>    
    </div>


    <h5>* Direccion</h5>
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
            <input type="text" class="form-control" id="inputAddress" placeholder="esquina blanca" required>
        </div> 

        <div class="form-group col-md-4">
            <label for="inputAddress">Numero</label>
            <input type="number" class="form-control" id="inputAddress" placeholder="022">
        </div> 

        <div class="form-group col-md-4">
            <label for="inputAddress">Depto</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="52-b">
        </div>    
    </div>
    <button type="submit" class="btn btn-primary">Crear</button>
</form>
@endsection