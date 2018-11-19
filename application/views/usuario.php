        <!--<script>
        FUTURA FUNCIONALIDAD
        $(document).ready(function (){
            $(".delete").click(function() {
                id = $(this.id);
                $.get('<?php echo site_url("ControllersUser/eliminar_fila/")?>' + id, null, function(data) {
                    if (data == "0") {
                        alert("ERROR");
                    } else {
                        $(this).parent().parent().remove();
                    }
                });
            });
        });
        </script>-->
        <h1 class="text-center">Lugares</h1>
        <h2 class="text-center"><?php echo $msg ?></h2>
        <table id="table_lugar" class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Longitud</th>
                    <th>Latitud</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    foreach ($lugares as $lugar) {
                        echo form_open('ControllersLugar/update/'.$lugar->id);
                        echo '<tr id="lugar"'.$lugar->id.'">';
                        echo '<td><input type="text" name="nombreLugar" id="" value="'.$lugar->nombre.'"></td>';
                        echo '<td><input type="text" name="descripcionLugar" id="" value="'.$lugar->descripcion.'"></td>';
                        echo '<td><input type="text" name="longitudLugar" id="" value="'.$lugar->longitud.'"></td>';
                        echo '<td><input type="text" name="latitudLugar" id="" value="'.$lugar->latitud.'"></td>';"<td></td>";
                        echo '<td><input type="submit" value="Modificar" class="btn btn-primary"></td>';
                        echo '<td><a class="btn btn-primary delete" href='.site_url("ControllersLugar/delete?id=$lugar->id").' role="button">Eliminar</a></td>';
                        echo '</tr></form>';
                    }
                ?>
            </tbody>
        </table>
        <a name="" id="" class="btn btn-primary" href=<?php echo site_url("ControllersLugar")?> role="button">Insertar</a>
        <h1 class="text-center">Peliculas</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Año</th>
                    <th>Pais</th>
                    <th>Cartel</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($peliculas as $pelicula) {
                        echo form_open('ControllersPeliculas/update/'.$pelicula->id);
                        echo '<tr>';
                        echo '<td><input type="text" name="tituloPelicula" id="" value="'.$pelicula->titulo.'"></td>';
                        echo '<td><input type="text" name="anioPelicula" id="" value="'.$pelicula->año.'"></td>';
                        echo '<td><input type="text" name="paisPelicula" id="" value="'.$pelicula->pais.'"></td>';
                        echo '<td><img name="cartelPelicula" id="" width="50px" src="'.base_url($pelicula->cartel).'"></td>';"<td></td>";
                        echo '<td><input type="submit" value="Modificar" class="btn btn-primary"></td>';
                        echo '<td><a class="btn btn-primary" href='.site_url("ControllersPeliculas/delete?id=$pelicula->id").' role="button">Eliminar</a></td>';
                        echo '</tr></form>';
                    }
                ?>
            </tbody>
        </table>
        <a name="" id="" class="btn btn-primary" href=<?php echo site_url("ControllersPeliculas")?> role="button">Insertar</a>
        <h1 class="text-center">Localizaciones</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Descripcion</th>
                    <th>fotografia</th>
                    <th>id_lugar</th>
                    <th>id_pelicula</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($localizaciones as $localizacion) {
                        echo form_open('ControllersLocalizacion/update/'.$localizacion->id);
                        echo '<tr>';
                        echo '<td><input type="text" name="descripcionLocalizacion" id="" value="'.$localizacion->descripcion.'"></td>';
                        echo '<td><input type="text" name="fotografiaLocalizacion" id="" value="'.$localizacion->fotografia.'"></td>';
                        echo '<td><input type="text" name="id_lugar" id="" value="'.$localizacion->id_lugar.'"></td>';
                        echo '<td><input type="text" name="id_pelicula" id="" value="'.$localizacion->id_pelicula.'"></td>';"<td></td>";
                        echo '<td><input type="submit" value="Modificar" class="btn btn-primary"></td>';
                        echo '<td><a class="btn btn-primary" href='.site_url("ControllersLocalizacion/delete?id=$localizacion->id").' role="button">Eliminar</a></td>';
                        echo '</tr></form>';
                    }
                ?>
            </tbody>
        </table> 
        <a name="" id="" class="btn btn-primary" href=<?php echo site_url("ControllersLocalizacion")?> role="button">Insertar</a>            
