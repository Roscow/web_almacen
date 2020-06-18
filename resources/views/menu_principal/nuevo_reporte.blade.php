@extends('menu_principal')


@section('seccion2')
    
    <h1>NUEVO REPORTE</h1>   
   <form action="{{route('reporte_ver')}}"  method="POST">
    @csrf
        <h6>* Plazo de analisis</h6>
        <div class="form-row">        
            <div class="form-group col-md-3">
                <label for="inputState">Seleccione mes  </label>
                <select name="month" id="inputState" class="form-control" required>
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
                <select name="year" id="inputState" class="form-control" required>
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
  

   
    @yield('contenido')     
@endsection