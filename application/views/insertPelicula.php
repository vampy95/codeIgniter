        <h1 class="text-center">Insertar Peliculas</h1>
        <?php echo form_open_multipart('ControllersPeliculas/insert'); ?>
            <div class="form-group">
            <label for="">Titulo</label>
            <input type="text" class="form-control" name="titulo" id="" aria-describedby="helpId" placeholder="">
            </div>
            <div class="form-group">
            <label for="">Año</label>
            <input type="text" class="form-control" name="anio" id="" aria-describedby="helpId" placeholder="">
            </div>
            <div class="form-group">
            <label for="">Pais</label>
            <input type="text" class="form-control" name="pais" id="" aria-describedby="helpId" placeholder="">
            </div>
            <div class="form-group">
            <label for="">Cartel</label>
            <input type="file" class="form-control" name="cartel" id="" aria-describedby="helpId" placeholder="">
            </div>
            <button type="submit" class="btn btn-primary">Insertar</button>
        </form>
