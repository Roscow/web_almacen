@extends('base')

@section('seccion')

<div class="wrapper">
  <div class="container-logo">
  <div class="roundedImage">&nbsp;</div>
</div > 

<form action="{{route('validaUsuario')}}" method="POST">
{{ csrf_field() }}
  <input type="email" id="email" name="email" placeholder="Usuario" required>
  <input type="password" id="password" name="password" placeholder="Contraseña" required>
  <!-- Trigger the modal with a button -->
  <a href="{{ route('recuperar_password') }}" data-toggle="modal" data-target="#myModalLogin"><font color = "white">Recuperar contraseña?</font> </a>

  <!--<a href="{{ route('menu_principal') }}" class="btn btn-primary buttonlogin" role="button" aria-pressed="true">Ingresar </a>-->
  <button type="submit"  class="btn btn-primary buttonlogin" role="button" aria-pressed="true">Ingresar</button>
  </form>

<!-- Modal -->
<div id="myModalLogin" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <form id="form1" action="{{route('recupera')}}" method="POST">
        {{ csrf_field() }}
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Recuperar Contraseña</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>
        <div class="modal-body">
        <input id="username" name="username" type="email"  placeholder="Ej: juanita.yuyitos@gmail.com" required >
        <h6 class="modal-title">Tú nueva contraseña será enviada a tu correo electronico</h6>
        </div>
        <div class="modal-footer">
			<!--<a href="javascript:;" onclick="document.getElementById('form1').submit();" class="btn btn-primary" role="button" aria-pressed="true">Enviar </a>-->
			<button type="submit" class="btn btn-primary" role="button" aria-pressed="true">Enviar </button>
        </div>
        </div>
    </form>
  </div>
</div>





<style>

*{
	box-sizing: border-box;
}
.roundedImage {
    background:url(images/logo2.jpg);
    background-repeat: no-repeat;
    background-size: cover;

    overflow:hidden;
    -webkit-border-radius:100px;
    -moz-border-radius:100px;
    border-radius:100px;
    width:180px;
    height:180px;
    margin-left: 120px;
}

body{
	
	font-size: 16px;
}

.wrapper{
	background-color: rgba(0,0,0,0.5);
	margin: auto;
	padding: 40px;
	border-radius: 5px;
	box-shadow: 0px 0px 10px #000;
	position: absolute;
	top: 0px;
	bottom: 0px;
	left: 0px;
	right: 0px;
	width: 500px;
	height: 500px;
}
.wrapper:before{
	background-image: url(images/Fondo.jpg);
	background-size: cover;
	content: "";
	position: fixed;
	top: 0px;
	bottom: 0px;
	left: 0px;
	right: 0px;
	z-index: -1;
	display: block;
	filter: blur(3px);
}
.wrapper .header-text{
	font-size: 32px;
	font-weight: 600;
	padding-bottom: 30px;
	text-align: center;
}

.wrapper input{
	padding: 10px;
	margin: 10px 0px;
	border-radius: 5px;
	width: 100%;
	font-size: 16px;
	font-family: Arial, Helvetica, sans-serif;
}
.wrapper input[type=checkbox]{
	display: none;
}
.wrapper label{
	position: relative;
	margin-left: 5px;
	margin-right: 10px;
	top: 5px;
	display: inline-block;
	width: 20px;
	height: 20px;
	cursor: pointer;

}
.wrapper label:before{
	content: "";
	display: inline-block;
	width: 20px;
	height: 20px;
	border-radius: 5px;
	position: absolute;
	left: 0px;
	bottom: 1px;
	background-color: #ddd;

}
.wrapper input[type=checkbox]:checked + label:before{
	content: '\2713';
	font-size: 20px;
	color: #262626;
	text-align: center;
	line-height: 20px;
}
.wrapper span{
	font-size: 14px;
}
.buttonlogin{
	background-color: #3366FF;
	color: #fff;
	border:none;
	border-radius: 5px;
	cursor: pointer;
	width: 100%;
	font-size: 18px;
	padding: 10px;
	margin: 20px 0px;
}

.buttonlogin:hover, .buttonlogin:focus, .buttonlogin:active {
  background-color: #337FFF !important;
  color: #fff !important;
  outline: none !important;
  box-shadow: none !important;
}

span a{
	color:#ddd;
}
</style>

@endsection
