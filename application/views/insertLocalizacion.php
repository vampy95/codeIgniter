        <h1 class="text-center">Insertar Localizacion</h1>
        <?php echo form_open('ControllersLocalizacion/insert'); ?>
            <div class="form-group">
            <label for="">Descripcion</label>
            <input type="text" class="form-control" name="descripcionLocalizacion" id="" aria-describedby="helpId" placeholder="">
            </div>
            <div class="form-group">
            <label for="">Fotografia</label>
            <input type="text" class="form-control" name="fotografiaLocalizacion" id="" aria-describedby="helpId" placeholder="">
            </div>
            <div class="form-group">
            <label for="">id_lugar</label>
            <input type="text" class="form-control" name="id_lugar" id="" aria-describedby="helpId" placeholder="">
            </div>
            <div class="form-group">
            <label for="">id_pelicula</label>
            <input type="text" class="form-control" name="id_pelicula" id="" aria-describedby="helpId" placeholder="">
            </div>
            <button type="submit" class="btn btn-primary">Insertar</button>
        </form>
