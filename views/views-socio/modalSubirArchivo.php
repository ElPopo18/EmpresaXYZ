<div class="modal" id="exampleModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Subir Archivo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form name="formEvento" id="formEvento" action="views/views-socio/subirArchivo.php" class="form-horizontal" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <input class="subir_archivo" type="file" name="archivo"> 
            <input type="submit" name="subir" value="Enviar"></input>
        </div>
      </form>

    </div>
  </div>
</div>