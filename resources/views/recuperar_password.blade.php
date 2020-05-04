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

<div class="container-full-width" style="margin-top: 70px">       
        <footer>              
            <div class="card">
                <div class="card-header">
                    2020 - Portafolio de titulo -Duoc UC - Desarrollado con Laravel
                </div>            
            </div>       
        </footer>
</div>
@endsection


 