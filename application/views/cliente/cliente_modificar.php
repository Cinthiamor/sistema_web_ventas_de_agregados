<?php
function set_selected($desired_value, $new_value)
{
    if($desired_value==$new_value)
    {
        echo ' selected="selected"';
    }
}

foreach ($infoCliente->result() as $row) {
?>
  <div class="content-wrapper">
    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col col-lg-6">

          <div class="card card-primary mt-3">
            <div class="card-header">
              <h3 class="card-title">Actualizar Cliente</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

              <form method="post" id="add_create" name="add_create" action="<?= site_url('cliente/modificarCliente') ?>">
                <div class="form-group">
                  <label>Nombre o Razon social *</label>
                  <input type="text" name="nombre_razonSocial" class="form-control" value="<?php echo $row->nombre_razonSocial; ?>" required>
                  <input type="hidden" name="idCliente" class="form-control" value="<?php echo $row->idCliente; ?>">
                </div>
                
                <div class="form-group">
                  <label>NIT o Carnet de Identidad *</label>
                  <input type="text" name="nit_carnet" class="form-control" placeholder="Escriba su numero de carnet de identidad" value="<?php echo $row->nit_carnet; ?>" minlength="6" required>
                </div>

                <div class="form-group">
                  <label>Direccion</label>
                  <input type="text" name="direccion" class="form-control" value="<?php echo $row->direccion; ?>">
                </div>

                <div class="form-group">
                  <label>Telefono</label>
                  <input type="text" name="telefono" class="form-control" value="<?php echo $row->telefono; ?>">
                </div>                

                <div class="form-group">
                  <button type="submit" class="btn btn-primary" onclick="return confirm('Usted quiere actualizar los datos de cliente?');">Guardar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php
}
?>

<div class="modal fade" id="modal-sm">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Cliente</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Estas seguro de guardar los cambios?</p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        <button type="button" class="btn btn-primary">Si</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->