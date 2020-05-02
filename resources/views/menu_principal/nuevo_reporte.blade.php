@extends('menu_principal')


@section('seccion2')
    
    <h1>NUEVO REPORTE</h1>   
    <form>
        <h6>* plazo de analisis</h6>
        <div class="form-row">        
            <div class="form-group col-md-3">
                <label for="inputState">Seleccione mes  </label>
                <select id="inputState" class="form-control">
                    <option selected>Choose...</option>
                    <option>...</option>
                </select>
            </div>  

            <div class="form-group col-md-3">
                <label for="inputState">Seleccione año </label>
                <select id="inputState" class="form-control">
                    <option selected>Choose...</option>
                    <option>...</option>
                </select>
            </div>  
        </div>
        <button type="submit" class="btn btn-primary">Generar reporte</button> 
    </form>
    <br><br>

    <p>
        *****ejemplo de reporte:****<br>
        periodo de analisis : julio - 2020<br>
        <br>productos mas vendidos
        <br>n° ventas en el periodo:
        <br>usuario que mas ventas realizo: 
        <br>proveedor al que mas se le pidio
        <h6>datos para el periodo actual </h6>
        <br> articulos por vencer en los prox 15 dias:
        <br> * producto 1
        <br> * producto 2
        <br> * producto 3
        <br> productos con stock critico
        <br> * producto 1
        <br> * producto 2

    </p>
    <form>
        <button type="submit" class="btn btn-primary">imprimir</button> 
    </form>

    @yield('contenido')     
@endsection