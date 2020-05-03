@extends('base')

@section('seccion')

<div class="wrapper">
  <div class="container-logo"> 
  <div class="roundedImage">&nbsp;</div>  
  </div >
	<input type="text" placeholder="Usuario">
  <input type="password" placeholder="Contraseña">
  <a href="{{ route('recuperar_password') }}" ><font color = "white">Recuperar contraseña</font> </a>

  <a href="{{ route('menu_principal') }}" class="btn btn-primary buttonlogin" role="button" aria-pressed="true">Ingresar </a>

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
	font-family: arial, Helvetica, sans-serif;
	font-size: 16px;
	color: #fff;
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
	background-image: url(https://i.pinimg.com/originals/f1/e3/3e/f1e33ea2f317cd6a3178646431099534.png);
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
	background-color: #fb5a2f;
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
  background-color: #fb5a2f !important;
  color: #fff !important;
  outline: none !important;
  box-shadow: none !important;
}

span a{
	color:#ddd;
}
</style>

@endsection