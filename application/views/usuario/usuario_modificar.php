<?php
function set_selected($desired_value, $new_value)
{
    if($desired_value==$new_value)
    {
        echo ' selected="selected"';
    }
}

foreach ($infoUsuario->result() as $row) {
?>
  <div class="content-wrapper">
    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col col-lg-6">

          <div class="card card-primary mt-3">
            <div class="card-header">
              <h3 class="card-title">Actualizar Usuario</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

              <form method="post" id="add_create" name="add_create" action="<?= site_url('usuario/modificarUsuario') ?>">
                <div class="form-group">
                  <label>Nombre/s *</label>
                  <input type="text" name="nombres" class="form-control" value="<?php echo $row->nombres; ?>" required>
                  <input type="hidden" name="idUsuario" class="form-control" value="<?php echo $row->idUsuario; ?>">
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6">
                      <label>Primer Apellido *</label>
                      <input type="text" name="primerApellido" class="form-control" value="<?php echo $row->primerApellido; ?>" required>
                    </div>
                    <div class="col-md-6">
                      <label>Segundo Apellido</label>
                      <input type="text" name="segundoApellido" class="form-control" value="<?php echo $row->segundoApellido; ?>">
                    </div>
                  </div>
                </div>
                <!-- <div class="form-group">
                <label>Fecha de Nacimiento *</label>
                <input type="text" name="fechaNacimiento" class="form-control" value="<?php echo $row->fechaNacimiento; ?>"  minlength="6"  required>
                </div> -->


                <div class="form-group">
                  <div class="row">
                    <div class="col-md-5">
                      <label>Fecha de Nacimiento *</label>
                      <input type="date" class="form-control" name="fechaNacimiento" required value="<?php echo $row->fechaNacimiento; ?>" >
                    </div> 
                    <div class="col-md-4">
                      <label>Carnet de Identidad *</label>
                      <input type="text" name="ci" class="form-control" value="<?php echo $row->ci; ?>" minlength="6" required>
                    </div>
                    <div class="col-md-3">
                      <label>Genero *</label>
                      <br>
                      <select class="form-select" name="genero" aria-label="seleccionar por defecto" >
                        <option value="M" <?php set_selected('M', $row->genero); ?>>Masculino</option>
                        <option value="F" <?php set_selected('F', $row->genero); ?>>Femenino</option>
                      </select>
                    </div>
                  </div>                  
                </div>

                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6">
                      <label>Usuario *</label>
                      <input type="text" name="login" class="form-control" value="<?php echo $row->login; ?>" minlength="6"  required>                
                    </div>
                    <div class="col-md-6">
                      <label>Contraseña *</label>
                      <input type="password" name="password" class="form-control"  minlength="6"  required>
                    </div>
                  </div>                                                        
                </div>

                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6">
                      <label>Celular</label>
                      <input type="text" name="celular" class="form-control" value="<?php echo $row->celular; ?>">
                    </div>
                    <div class="col-md-6">
                      <label>Correo electronico</label>
                      <input type="email" name="correo" class="form-control" value="<?php echo $row->correo; ?>">
                    </div>
                  </div>
                </div>
                
                <div class="form-group">                
                  <div class="row">
                    <div class="col-md-9">
                      <label>Direccion</label>
                      <input type="text" name="direccion" class="form-control" value="<?php echo $row->direccion; ?>">                
                    </div>
                    <div class="col-md-3">
                      <label>Tipo de usuario</label>
                      <br>
                      <select class="form-select" name="idTipoUsuario" aria-label="seleccionar por defecto" >
                        <option value="1" <?php set_selected('admin', $row->idTipoUsuario); ?>>Admin</option>
                        <option value="2" <?php set_selected('vendedor', $row->idTipoUsuario); ?>>Vendedor</option>
                      </select>
                    </div>
                  </div>                
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-primary" onclick="return confirm('Usted quiere actualizar los datos de usuario?');">Guardar</button>
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
        <h4 class="modal-title">Usuario</h4>
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