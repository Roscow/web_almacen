// Capturando el DIV alerta y mensaje (no es necesario)
var alerta = document.getElementById("alerta");
var mensaje = document.getElementById("mensaje");

// Permitir sólo números en el imput
function isNumber(evt) {
    var charCode = evt.which ? evt.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode === 75) return false;

    return true;
  }

  function checkRut(inputAddress) {

    if (inputAddress.value.length <= 1) {
      alerta.classList.remove('alert-success', 'alert-danger');
      alerta.classList.add('alert-info');
      mensaje.innerHTML = 'Ingrese un RUT en el siguiente campo de texto para validar si es correcto o no';
    }

    // Obtiene el valor ingresado quitando puntos y guión.
    var valor = clean(inputAddress.value);

    // Divide el valor ingresado en dígito verificador y resto del RUT.
    cuerpo = valor.slice(0, -1);
    dv = valor.slice(-1).toUpperCase();

    // Separa con un Guión el cuerpo del dígito verificador.
    inputAddress.value = format(inputAddress.value);

    // Calcular Dígito Verificador "Método del Módulo 11"
    suma = 0;
    multiplo = 2;

    // Para cada dígito del Cuerpo
    for (i = 1; i <= cuerpo.length; i++) {
      // Obtener su Producto con el Múltiplo Correspondiente
      index = multiplo * valor.charAt(cuerpo.length - i);

      // Sumar al Contador General
      suma = suma + index;

      // Consolidar Múltiplo dentro del rango [2,7]
      if (multiplo < 7) {
        multiplo = multiplo + 1;
      } else {
        multiplo = 2;
      }
    }

    // Calcular Dígito Verificador en base al Módulo 11
    dvEsperado = 11 - (suma % 11);

    // Casos Especiales (0 y K)
    dv = dv == "K" ? 10 : dv;
    dv = dv == 0 ? 11 : dv;

    // Validar que el Cuerpo coincide con su Dígito Verificador
    if (dvEsperado != dv) {
      //en realidad aqui dice INVALIDO pero cuando esta ok el rut lo muestra invalido. solo hay que seguir rellenando, pasa piola :D

      alerta.classList.add('alert-danger');
      mensaje.innerHTML = 'El RUT ingresado: ' + inputAddress.value + ' Es <strong>INCORRECTO</strong>.';

      return false;
    } else {

        inputAddress.setCustomValidity("");//aqui decia valido
      //esta un poco mejor sin esto
      /* rut.setCustomValidity("RUT Válido");
      alerta.classList.remove('d-none', 'alert-danger');
      alerta.classList.add('alert-success');
      mensaje.innerHTML = 'El RUT ingresado: ' + rut.value + ' Es <strong>CORRECTO</strong>.'; */
      return true;
    }
  }

  function format (inputAddress) {
    inputAddress = clean(inputAddress)

    var result = inputAddress.slice(-4, -1) + '-' + inputAddress.substr(inputAddress.length - 1)
    for (var i = 4; i < inputAddress.length; i += 3) {
      result = inputAddress.slice(-3 - i, -i) + '.' + result
    }

    return result
  }

  function clean (inputAddress) {
    return typeof inputAddress === 'string'
      ? inputAddress.replace(/^0+|[^0-9kK]+/g, '').toUpperCase()
      : ''
  }

  // POR AHORA ESTA VALIDACION NO SIRVE (A PESAR QUE FUNCIONA OK) SI EL RUT EN LA BASE DE DATOS ES INT :C


  ////////////////////////////////////////////////



  function crearCliente()
  {
          /* var nom=document.forma.inputNombre.value; */
          var nom=document.getElementById("inputNombre").value;
          var nom2=document.getElementById("inputNombre2").value;

          var ape=document.getElementById("inputApellido").value;
          var ape2=document.getElementById("inputApellido2").value;

          var dir=document.getElementById("selectRegion").value;
          var dir2=document.getElementById("selectComuna").value;

//inputState
          if( nom == null || nom.length == 0 || /^\s+$/.test(nom))
          {
              alert('ERROR: El campo nombre no debe ir vacío...');
              document.forma.inputNombre.value="";
              document.forma.inputNombre.focus();
              return false;
          }

          if( nom2 == null || nom2.length == 0 || /^\s+$/.test(nom2))
          {
              alert('ERROR: El campo segundo nombre no debe ir vacío...');
              document.forma.inputNombre2.value="";
              document.forma.inputNombre2.focus();
              return false;
          }

          if( ape == null || ape.length == 0 || /^\s+$/.test(ape))
          {
              alert('ERROR: El campo primer apellido no debe ir vacío...');
              document.forma.inputApellido.value="";
              document.forma.inputApellido.focus();
              return false;
          }

          if( ape2 == null || ape2.length == 0 || /^\s+$/.test(ape2))
          {
              alert('ERROR: El campo segundo apellido no debe ir vacío...');
              document.forma.inputApellido2.value="";
              document.forma.inputApellido2.focus();
              return false;
          }

          if( dir == "Elegir...")
          {
              alert('ERROR: Debe escoger una Region...');
              document.forma.selectRegion.focus();
              return false;
          }

          if( dir2 == "Elegir...")
          {
              alert('ERROR: Debe escoger una Comuna...');
              document.forma.selectComuna.focus();
              return false;
          }

          return true;
  }

  function soloNumeros(e){
      //e = evento
      //almacena entrada del teclado
      key = e.keyCode || e.wich;

      teclado = String.fromCharCode(key);

      numeros = "0123456789";

      especiales = "8-37-38-46"; //teclas: backspace, izquierda, derecha, suprimir.

      teclado_especial = false;

      for(var i in especiales){
          if(key == especiales[i]){
              teclado_especial=true;
          }
      }

      if(numeros.indexOf(teclado)==-1 && !teclado_especial){
          return false;
      }
  }

  function soloLetras(e) {
    var key = e.keyCode || e.which,
      tecla = String.fromCharCode(key).toLowerCase(),
      letras = " áéíóúabcdefghijklmnñopqrstuvwxyz",
      especiales = [8, 37, 39, 46], //teclas: backspace, izquierda, derecha, suprimir.
      tecla_especial = false;

    for (var i in especiales) {
      if (key == especiales[i]) {
        tecla_especial = true;
        break;
      }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
      return false;
    }
  }
