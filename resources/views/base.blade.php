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
  <body>

    


    
    <div class="container-full-width">
        @yield('seccion')    
    </div>

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