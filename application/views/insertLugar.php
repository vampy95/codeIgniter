        <h1 class="text-center">Insertar Lugar</h1>
        <?php echo form_open('ControllersLugar/insert'); ?>
            <div class="form-group">
            <label for="">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="" aria-describedby="helpId" placeholder="">
            </div>
            <div class="form-group">
            <label for="">Descripcion</label>
            <input type="text" class="form-control" name="descripcion" id="" aria-describedby="helpId" placeholder="">
            </div>
            <div class="form-group">
            <label for="">Longitud</label>
            <input type="text" class="form-control" name="longitud" id="" aria-describedby="helpId" placeholder="">
            </div>
            <div class="form-group">
            <label for="">Latitud</label>
            <input type="text" class="form-control" name="latitud" id="" aria-describedby="helpId" placeholder="">
            </div>
            <button type="submit" class="btn btn-primary">Insertar</button>
        </form>