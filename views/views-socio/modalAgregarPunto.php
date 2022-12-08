<div class="modal" id="modalUpdateEvento" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Subir punto para esta reunion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form name="formEvento" id="formEvento" action="views/views-socio/subirArchivo.php" class="form-horizontal" method="POST" enctype="multipart/form-data" style="width: 100%;">
        <div class="form-group">
          <label for="evento" class="col-sm-12 control-label">Descripcion del punto</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Descripcion del punto" required />
          </div>
        </div>
        <div class="form_grupo block" style="display: grid;text-align: center;grid-template-columns: repeat(3, 1fr);margin-bottom: 1rem;">
          <label>Tipo: </label>
          <span class="tipo">
            <label>De desicion</label>
            <input type="radio" name="tipo" value="desicion" style="visibility: initial;">
          </span>
          <span class="tipo">
            <label>De informacion</label>
            <input type="radio" name="tipo" value="desicion" style="visibility: initial;">
          </span>
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