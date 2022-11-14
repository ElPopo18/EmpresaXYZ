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
          <div class="col-md-12 activado">

            <input type="radio" name="color_reunion" id="orangeUpd" value="#FF5722" checked>
            <label for="orangeUpd" class="circu" style="background-color: #FF5722;"> </label>

            <input type="radio" name="color_reunion" id="amberUpd" value="#FFC107">
            <label for="amberUpd" class="circu" style="background-color: #FFC107;"> </label>

            <input type="radio" name="color_reunion" id="limeUpd" value="#8BC34A">
            <label for="limeUpd" class="circu" style="background-color: #8BC34A;"> </label>

            <input type="radio" name="color_reunion" id="tealUpd" value="#009688">
            <label for="tealUpd" class="circu" style="background-color: #009688;"> </label>

            <input type="radio" name="color_reunion" id="blueUpd" value="#2196F3">
            <label for="blueUpd" class="circu" style="background-color: #2196F3;"> </label>

            <input type="radio" name="color_reunion" id="indigoUpd" value="#9c27b0">
            <label for="indigoUpd" class="circu" style="background-color: #9c27b0;"> </label>

          </div>
          <input class="subir_archivo" type="file" name="archivo">
          <input class="enviar" type="submit" name="subir" value="Enviar"></input>
        </div>
      </form>
    </div>
  </div>
</div>