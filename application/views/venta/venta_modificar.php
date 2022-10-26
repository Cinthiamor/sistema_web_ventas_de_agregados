<?php
function set_selected($desired_value, $new_value)
{
    if($desired_value==$new_value)
    {
        echo ' selected="selected"';
    }
}

foreach ($infoProducto->result() as $row) {
?>
  <div class="content-wrapper">
    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col col-lg-6">

          <div class="card card-primary mt-3">
            <div class="card-header">
              <h3 class="card-title">Actualizar Producto</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

              <form method="post" id="add_create" name="add_create" action="<?= site_url('cliente/modificarProducto') ?>">
                <div class="form-group">
                  <label for="nombre" class="form-label">Nombre del Producto*</label>
                  <input type="text" name="nombre" class="form-control" value="<?php echo $row->nombre; ?>" required>
                  <input type="hidden" name="idProducto" class="form-control" value="<?php echo $row->idProducto; ?>">
                </div>

                <div class="form-group">
                  <label>Descripcion</label>
                  <input type="text" name="descripcion" class="form-control" value="<?php echo $row->descripcion; ?>">                  
                </div>

                <div class="form-group">
                  <label for="Precio" class="form-label">Precio *</label>
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" name="precio" value="<?php echo $row->precio; ?>">
                    <div class="input-group-append">
                      <span class="input-group-text">Bs.</span>
                    </div>
                  </div>
                </div> 
                
                <!--<div class="form-group">
                  <label>Imagen</label>
                  <div class="custom-file">
                        <input type="file" class="custom-file-input" id="img" name="img">
                        <label class="custom-file-label" for="customFile">Buscar archivo</label>
                      </div>
                </div>-->
                <div class="form-group">
                  <label>Tipo de producto</label>
                  <select class="form-select" name="idTipoProducto" aria-label="seleccionar por defecto" >
                    <option value="1"<?php set_selected('admin', $row->idTipoProducto); ?>>Agregado Fino</option>
                    <option value="2"<?php set_selected('admin', $row->idTipoProducto); ?>>Agregado Grueso</option>
                  </select>
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
        <h4 class="modal-title">Producto</h4>
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