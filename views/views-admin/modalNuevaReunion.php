<div class="modal" id="nuevaReunion" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Registrar Nueva Reunion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form name="formEvento" id="formEvento" action="" class="form-horizontal">
        <div class="form-group">
          <label for="nombre_empresa" class="col-sm-12 control-label">Nombre de la empresa</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="nombre_empresa" id="nombre_empresa" placeholder="Nombre de la empresa" required />
          </div>
        </div>
        <div class="form-group">
          <label for="nombre_empresa" class="col-sm-12 control-label">Hora de inicio</label>
          <div class="col-sm-10">
            <input type="time" class="form-control" name="hora_inicio" id="hora_inicio" required />
          </div>
        </div>
        <div class="form-group">
          <label for="nombre_empresa" class="col-sm-12 control-label">Hora de Fin</label>
          <div class="col-sm-10">
            <input type="time" class="form-control" name="hora_fin" id="hora_fin" required />
          </div>
        </div>
        <div class="form-group d-none">
          <label for="fecha_inicio" class="col-sm-12 control-label">Fecha Inicio</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="fecha_inicio" id="fecha_inicio" placeholder="Fecha Inicio" required>
          </div>
        </div>
        <div class="form-group d-none">
          <label for="fecha_fin " class="col-sm-12 control-label">Fecha Final</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="fecha_fin" id="fecha_fin" placeholder="Fecha Final" required>
          </div>
        </div>
        <div class="col-md-12" id="grupoRadio">
          <input type="radio" name="color_reunion" id="crimson" value="#DC143C" checked>
          <label for="crimson" class="circu" style="background-color: #DC143C;"> </label>
          
          <input type="radio" name="color_reunion" id="orange" value="#FF5722">
          <label for="orange" class="circu" style="background-color: #FF5722;"> </label>
          <input type="radio" name="color_reunion" id="amber" value="#FFC107">
          <label for="amber" class="circu" style="background-color: #FFC107;"> </label>
          <input type="radio" name="color_reunion" id="lime" value="#8BC34A">
          <label for="lime" class="circu" style="background-color: #8BC34A;"> </label>
          <input type="radio" name="color_reunion" id="teal" value="#009688">
          <label for="teal" class="circu" style="background-color: #009688;"> </label>
          <input type="radio" name="color_reunion" id="blue" value="#2196F3">
          <label for="blue" class="circu" style="background-color: #2196F3;"> </label>
          <input type="radio" name="color_reunion" id="indigo" value="#9c27b0">
          <label for="indigo" class="circu" style="background-color: #9c27b0;"> </label>
          
        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-success" value="Guardar Evento"></input>
          <input type="hidden" name="n" value="nuevaReunion">
        </div>
      </form>
    </div>
  </div>
</div>