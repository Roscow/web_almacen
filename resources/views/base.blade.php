<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="{{ asset('css/print.min.css') }}"  rel="stylesheet">
    <title>Almacén los Yuyitos</title>
  </head>
  <body style="margin-bottom:55px;">

    <div class="container-full-width">
        @yield('seccion')
    </div>


    @isset($mensaje)


    <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <form id="form1" action="{{route('recupera')}}" method="POST">
            {{ csrf_field() }}
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" style="height: 140px;">

                <div class="row">
                    <div class="col-md-8">
                        <h6 class="modal-title" style="margin: 50px 0px 0px 0px;">{{$mensaje}} </h6>
                    </div>
                    <div class="col-md-4">
                        <img src="{{URL::asset('/images/check.gif')}}" height="160" width="180" style="margin: 0px 0px 0px -30px; position: fixed; ">
                    </div>
                </div>
                <br>
                <br>
            </div>
            <br>
            <br>
        </form>
    </div>

    </div>

    <script>
        $(document).ready(function(){
            $("#myModal").modal('show');
        });
    </script>

    @endif

       <!--Modal error-->
    @isset($error)

    <div id="myModalError" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <form id="form1" action="{{route('recupera')}}" method="POST">
                {{ csrf_field() }}
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" style="height: 140px;">
                    <div class="row">
                        <div class="col-md-8">
                           <h6 class="modal-title" style="margin: 40px 0px 0px 0px;">{{$error}} </h6>
                        </div>
                        <div class="col-md-4">
                            <img src="{{URL::asset('/images/x.gif')}}" height="80" width="90" style="margin: 0px 0px 0px 0px; position: fixed; ">
                        </div>
                    </div>
                <br>
                <br>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $("#myModalError").modal('show');
        });
    </script>

    @endif

<script>
    $(document).ready (function() {
        $('#selectRegion').on('change', function() {
            var id_region = $(this).val () ;
            if ($.trim(id_region) != '') {
                $('#selectComuna').empty();
                $('#selectComuna').append("<option value=''> Cargando Comunas ....</option>");
                $.get('obtener_comunas',{id_region: id_region}, function (comunas) {
                    $('#selectComuna').empty();
                    $('#selectComuna').append("<option value=''> Selecciona una comuna</option>");
                    $.each(comunas, function (index, value) {
                        console.log(value);
                        $('#selectComuna').append("<option value='"+ index + "'>"+ value +"</option");
                    })
                });
            }
        });
    });

    function validaterut(rutCompleto) {

		    if (!/^[0-9]+[-|‐]{1}[0-9kK]{1}$/.test( rutCompleto.value)){
                alert('Formato Rut Invalido !!!');
                return false;
                
            }
			
		    var tmp 	= rutCompleto.value.split('-');
		    var digv	= tmp[1]; 
		    var rut 	= tmp[0];
		    if ( digv == 'K' ) digv = 'k' ;
		    if(!(dv(rut) == digv) ){
                alert('Rut Invalido !!!');
                return false;
            }

        return true;
	}
    
	function dv(T){
	    	var M=0,S=1;
		    for(;T;T=Math.floor(T/10))
			S=(S+T%10*(9-M++%6))%11;
		    return S?S-1:'k';
	}

</script>
<style>
    ::-webkit-input-placeholder { /* WebKit, Blink, Edge */
color: DCDADA !important;/*!Important sirve para dar orden inmediata de cambiar el color*/
}
:-moz-placeholder { /* Mozilla Firefox 4 to 18 */
color: DCDADA !important;
opacity: 1 /* esto es porque Firefox le reduce la opacidad por defecto */;
}
::-moz-placeholder { /* Mozilla Firefox 19+ */
color: DCDADA !important;
opacity: 1;
}
:-ms-input-placeholder { /* Internet Explorer 10-11 */
color: DCDADA !important;
}
   </style>


    <!-- Optional JavaScript -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="jotaese/cliente_crear.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ asset('js/print.min.js') }}"></script>

  </body>

</html>
