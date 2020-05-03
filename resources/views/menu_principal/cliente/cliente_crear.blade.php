


@extends('menu_principal')



@section('seccion2')

      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="modaluser">Crear Usuario</h4>
          </div>
          <div class="modal-body">
              <div class="columns">


                <div class="form">
                    <label for="rut" class="control-label">Rut: </label>
                    <input type="text" class="form-control{{--  col-lg-8 --}}" id="rut" name="rut" required maxlength="12" placeholder="11.111.111">
                </div>
                <div class="form">
                    <label for="dv" class="control-label offset-md-3">Dv:</label>
                    <input type="text" class="form-control offset-md-3{{--  col-lg-1 offset-lg-9 offset-md-9 --}}" id="dv" name="dv" required maxlength="1" placeholder="1">
                </div>


                <div class="form-group">
                    <label for="nombre1" class="control-label">Primer Nombre:</label>
                    <input type="text" class="form-control" id="nombre1" name="nombre" required maxlength="15" placeholder="Alan">
                  </div>
                  <div class="form-group">
                    <label for="nombre2" class="control-label">Segundo Nombre:</label>
                    <input type="text" class="form-control" id="nombre2" name="nombre" required maxlength="15" placeholder="Brito">
                  </div>


                  <div class="form-group">
                    <label for="apellido1" class="control-label">Primer Apellido:</label>
                    <input type="text" class="form-control" id="apellido1" name="apellido" required maxlength="15" placeholder="Delgado">
                  </div>
                  <div class="form-group">
                    <label for="apellido2" class="control-label">Segundo Apellido:</label>
                    <input type="text" class="form-control" id="apellido2" name="apellido" required maxlength="15" placeholder="Del Campo">
                  </div>


                  <div class="form-group">
                    <label for="direccion" class="control-label">Dirección:</label>
                    <input type="text" class="form-control" id="direccion1" name="direccion" required maxlength="15" placeholder="Delgado">
                  </div>
                  <div class="form-group">
                    <label for="telefono1" class="control-label">Teléfono:</label>
                    <input type="text" class="form-control" id="telefono1" name="telefono" onKeypress="if (event.keyCode 57) event.returnValue = false" pattern="[0-9]+"required maxlength="15" placeholder="+569 12345678">
                  </div>


                  <div class="form-group">
                    <label for="monto1" class="control-label">Monto Deuda:</label>
                    <input type="text" class="form-control" id="monto1" name="monto" required maxlength="15" placeholder="0">
                  </div>

              </div>

                <div class=" modal-footer">
                    <a id="guardar" class="btn btn-primary col-lg-12" href="{{ route('menu_cliente') }}" role="button">Guardar datos</a>
                </div>
                <div class=" modal-footer">
                    <a id="guardar" class="btn btn-primary col-lg-12" href="{{ route('menu_cliente') }}" role="button">Volver</a>
                </div>


        </div>
      </div>
    </div>
    <style>
        .modal-body{
            background-color: rgba(204, 197, 197, 0.363);
        }

        .columns >div{
            display:inline-block;
            vertical-align: top;
            width: 50%;
            margin-right: -3px;

        }

        .columns >div #dv{
            margin-right: 20px;
            width: 30%;
            border-radius: 10px;
            border: 1px solid #666666;
        }

        .columns >div #rut{
            width: 220px;
            border-radius: 10px;
            border: 1px solid #666666;
        }

        .columns >div #nombre1{
            padding: 10px;
            width: 94%;
            border-radius: 10px;
            border: 1px solid #666666;
        }

        .columns >div #nombre2{
            width: 94%;
            border-radius: 10px;
            border: 1px solid #666666;
        }

        .columns >div #apellido1{
            padding: 10px;
            width: 94%;
            border-radius: 10px;
            border: 1px solid #666666;
        }

        .columns >div #apellido2{
            width: 94%;
            border-radius: 10px;
            border: 1px solid #666666;
        }

        .columns >div #direccion1{
            padding: 10px;
            width: 94%;
            border-radius: 10px;
            border: 1px solid #666666;
        }

        .columns >div #telefono1{
            width: 94%;
            border-radius: 10px;
            border: 1px solid #666666;
        }

        .columns #monto1 {
            width: 94%;
            border-radius: 10px;
            border: 1px solid #666666;
        }

        .modal-dialog{
            border-radius: 10px;
            border: 1px solid #666666;
        }
        .modal-header{
            border: 1px solid #9b9696;
        }

        /* esto del box es solo para ver como quedaba el boton :D */
        .box{
            position: relative;
            width: 300px;
            height: 400px;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #060c21;
            margin: 40px;
        }


        .box:nth-child(1):before,
        .box:nth-child(1):after,#guardar{
            background: linear-gradient(235deg,#2c00f1,
            #010615,#00bcd4);
        }

        .box:nth-child(2):before,
        .box:nth-child(2):after,#guardar{
            background: linear-gradient(235deg,#025164,
            #300ad8,#f8e804);
        }

        .box:nth-child(3):before,
        .box:nth-child(3):after,#guardar{
            background: linear-gradient(235deg,#09f8e4,
            #091bb8,#00e9fa);
        }

        #guardar{
            position: relative;
            top: 0;
            left: 0;
            width: 50%;
            height: 100%;
            display: block;
            border-radius: 50px;
            background: rgba(236, 6, 6, 0.1)
            pointer-events: none;
        }

        #guardar{
            padding: 20px;
            color: #fff;
        }

    </style>

@endsection

