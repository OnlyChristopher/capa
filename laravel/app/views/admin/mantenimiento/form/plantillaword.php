<!-- /.modal -->
<div class="modal fade" id="plantillaModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header logo">
        <button class="btn btn-sm btn-default pull-right" data-dismiss="modal">
            <i class="fa fa-close"></i>
        </button>
        <h4 class="modal-title">New message</h4>
      </div>
      <div class="modal-body">
        <form id="form_plantilla" name="form_plantilla" action="plantilla/editar" method="post">
        <div class="form-group">
            <div class="col-xs-6">
                <label class="control-label">Nombre
                    <a id="error_nombre" style="display:none" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="bottom" title="Ingrese Nombre">
                        <i class="fa fa-exclamation"></i>
                    </a>
                </label>
                <input type="text" class="form-control" placeholder="Ingrese Nombre" name="txt_nombre" id="txt_nombre">
            </div>
            <div class="col-xs-6">
                <label class="control-label">Estado:
                </label>
                <select class="form-control" name="slct_estado" id="slct_estado">
                    <option value='0'>Inactivo</option>
                    <option value='1' selected>Activo</option>
                </select>
            </div>
          </div>
          <div class="form-group">
              <textarea id="word" name="word"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>
<!-- /.modal -->