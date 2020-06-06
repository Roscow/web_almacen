@extends('base')


@section('seccion')

<div class="container-full-width">
        <header>         
            <div class="card">
            <div class="card-header">
                <a class="navbar-brand" href="#">
                <img src="https://cdn.icon-icons.com/icons2/943/PNG/128/shoppaymentorderbuy-29_icon-icons.com_73875.png" width="30" height="30" class="d-inline-block align-top" alt="">
                AlMACEN LOS YUYITOS - SISTEMA DE CONTROL Y GESTION
               </a>          
            </div>
        </div>
     </header>
</div>


<div class="container" style="margin-top: 50px;width: 50%">
    <div class="row border" style="margin-top: width: 40%">
        <div class="col-xs-12" style="margin-left: 50px; padding: 50px">
            <div class="row">
                <div class="col-lg-6">
                    <h2>RECUPERAR CONTRASEÑA</h2>
                </div> 
                <div class="col-lg-6">
                    <img src="images/logo2.jpg" width="170px"; height="170px;">
                </div> 
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group" >
                    <label for="formGroupExampleInput">Contraseña nueva</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                    <label for="formGroupExampleInput2">Confirma tu contraseña nueva</label>
                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                        <a href="{{ route('login') }}" class="btn btn-primary" role="button" aria-pressed="true">Guardar cambios </a>
                </div>
            </div>
        </div>
    </div>

</div> 

<footer style="position: fixed;left: 0;bottom: 0;width: 100%;">
            <br>
            <div class="container-full-width">
            <nav class="bg-primary">
                <div class="card-header" style="color: white ;">
                    2020 - Portafolio de titulo -Duoc UC - Desarrollado con Laravel

                    <div style="float: right">
                        @php
                            date_default_timezone_set ("America/Santiago");
                            setlocale(LC_TIME, "spanish");
                        
                            echo mb_convert_case(utf8_encode(strftime("%A, %d de %B %Y %H:%M")), MB_CASE_TITLE, 'UTF-8');
                        
                        @endphp
                    </div>

                </div>
                </div>
            </div>
        </footer>


@endsection


 