      <!-- SCRIPT PARA COMPROBAR QUE EL USUARIO INTRODUCIDO EN EL LOGUIN ES CORRECTO -->
      <script>
        window.onload = function (){
          //CAPTURAR EVENTO BLUR, EN EL INPUT DE USUARIO
          document.getElementById("usuario").addEventListener("blur", function(){
            //captura el valor del campo input del usuario
            let nombre = document.getElementById("usuario").value;
            //llamo a la funcion ajax para comprobar que el usuario existe
            comprobar_nombre(nombre);
          });
        };
        //FUNCION AJAX PARA COMPROBAR SI EL NOMBRE DE USUARIO EXISTE EN LA TABLA DE USUARIOS
        function comprobar_nombre(nombre) {
          let xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            //COMPRUEBO QUE EL SERVIDOR RESPONDE
            if (this.readyState == 4 && this.status == 200) {
              //Si la respuesta es mayor que uno, significa que el usario existe en la base de datos
              if(this.responseText >= 1){
                document.getElementById("mensajeUsuario").innerHTML = "Usuario correcto";
              }else{
                document.getElementById("mensajeUsuario").innerHTML = "Usuario incorrecto";                
              }
            }
          };
          xhttp.open("GET", '<?php echo site_url("ControllersUser/comprobar_usuario/")?>' + encodeURIComponent(nombre), true);
          xhttp.send(null);
        }
      </script>
      <h1 class="text-center">Login</h1>
      <form action="index.php/ControllersUser/comprobarLogin" method="get">
      <div class="form-group">
          <label for="usuario">Usuario</label>
          <input type="text" class="form-control" name="usuario" id="usuario" aria-describedby="helpId" placeholder="Usuario"><br>
          <span id="mensajeUsuario"></span>
        </div>
        <div class="form-group">
          <label for="contraseña">Contraseña</label>
          <input type="text" class="form-control" name="contraseña" id="contraseña" aria-describedby="helpId" placeholder="Contraseña">
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
      </form>
