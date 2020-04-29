@extends('base')


@section('seccion')
    <h1>login</h1>
    

    <!--login con boostrap-->
    <form>
  <div class="form-row">

    <div class="col-md-4 mb-3">
      <label for="validationServer01">Usuario</label>
      <input type="text" class="form-control is-valid" id="validationServer01" placeholder="First name" value="Mark" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
       
  </div>
  <div class="form-row">
        <div class="col-md-4 mb-3">
        <label for="validationServer02">Contraseña</label>
        <input type="password" class="form-control is-valid" id="validationServer02" placeholder="Last name" value="Otto" required>
        <div class="valid-feedback">
        Looks good!
        </div>
        </div>

  </div>
  <div class="form-group">    
  </div>
  <button class="btn btn-primary" type="submit">
        <a class="nav-item"  href="{{ route('menu_principal') }}">Ingresar</a>
  </button>
  <a class="link-mod" href="{{ route('recuperar_password') }}" > 
  <style type="text/css" media="screen">
        .link-mod:link {text-decoration: none };
        .link-mod:hover { color: white; font-family: arial; text-decoration: none };
        .link-mod:visited {color: white;  font-family: arial; text-decoration: none };
	*{outline:none !important;}*:focus {outline: none !important;}textarea:focus, input:focus{outline: none !important;}	a{text-decoration: none !important;outline: none !important;}
</style>
  recuperar contraseña</a>


</form>
@endsection