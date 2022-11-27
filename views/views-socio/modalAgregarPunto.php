<div class="modal" id="modalUpdateEvento" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Subir punto para esta reunion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form name="formEvento" id="formEvento" action="views/views-socio/subirArchivo.php" class="form-horizontal" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="evento" class="col-sm-12 control-label">Descripcion de la reunion</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Descripcion de la reunion" required />
          </div>
        </div>
        <div class="form-group">
          <input type="hidden" class="form-control" name="id_reunion" id="id_reunion">
          <input type="hidden" class="form-control" name="id_punto" id="id_punto">
          <input type="hidden" class="form-control" name="fecha_inicio" id="fecha_inicio" placeholder="Fecha Inicio">
          <input type="hidden" class="form-control" name="fecha_fin" id="fecha_fin" placeholder="Fecha Final">
          <input class="subir_archivo" type="file" name="archivo">
          <input class="enviar" type="submit" name="subir" value="Enviar"></input>
        </div>
      </form>
    </div>
  </div>
</div>