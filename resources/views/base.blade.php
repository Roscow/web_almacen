<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

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
            
            <img src="{{URL::asset('/images/check.gif')}}" height="160" width="180" style="left: 48%; margin: 6%; padding: 0; position: fixed; top: 0;">
            <br>
            <br>
            <h6 class="modal-title">{{$mensaje}} </h6>

    
            </div>
            <br>
            <br>

            </div>
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
                
                <img src="{{URL::asset('/images/x.gif')}}" height="80" width="90" style="left: 53%; margin: 6%; padding: 0; position: fixed; top: 5%;">
                <br>
                <br>
                <h6 class="modal-title">{{$error}} </h6>

        
                </div>
                <br>
                <br>

                </div>
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
</script>

    <!-- Optional JavaScript -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>

</html>