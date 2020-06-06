@extends('menu_principal')


@section('seccion2')
    
    <h1>NUEVO REPORTE</h1>   
    <form>
        <h6>* Plazo de analisis</h6>
        <div class="form-row">        
            <div class="form-group col-md-3">
                <label for="inputState">Seleccione mes  </label>
                <select id="inputState" class="form-control" required>
                <option value="" selected>Elegir...</option>
                <option value="01">Enero</option> 
                <option value="02">Febrero</option> 
                <option value="03">Marzo</option> 
                <option value="04">Abril</option> 
                <option value="05">Mayo</option> 
                <option value="06">Junio</option> 
                <option value="07">Julio</option> 
                <option value="08">Agosto</option> 
                <option value="09">Septiembre</option> 
                <option value="10">Octubre</option> 
                <option value="11">Noviembre</option> 
                <option value="12">Diciembre</option> </option>
                
                </select>
                    
            </div>  

            <div class="form-group col-md-3">
                <label for="inputState">Seleccione año </label>
                <select id="inputState" class="form-control" required>
                    <option value="" selected>Elegir...</option>
                    <option value="2020">2020</option>
                    <option value="2019">2019</option>
                    <option value="2018">2018</option> 
                    <option value="2017">2017</option> 
                    <option value="2016">2016</option> 
                    <option value="2015">2015</option> 
                    <option value="2014">2014</option> 
                    <option value="2013">2013</option> 
                    <option value="2012">2012</option> 
                    <option value="2011">2011</option> 
                    <option value="2010">2010</option> 
                </select>
            </div>  
        </div>
        <button type="submit" class="btn btn-primary">Generar reporte</button> 
    </form>
    <br><br>

    <p>
        *****Ejemplo de reporte:****<br>
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
        <button type="submit" class="btn btn-primary">Imprimir</button> 
    </form>

    @yield('contenido')     
@endsection