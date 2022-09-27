<div class="content-wrapper">
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col col-lg-6">

        <div class="card card-primary mt-3">
          <div class="card-header">
            <label class="card-title">Crear Usuario</label>
          </div>
          <!-- /.card-header -->
          <div class="card-body">

            <form method="post" id="add_create" name="add_create" action="<?= site_url('usuario/crearUsuario') ?>">

              <div class="form-group">
                <label for="nombre" class="form-label">Nombre *</label>
                <input id="nombre" type="text" name="nombre" class="form-control" placeholder="Escriba el Nombre" required>
              </div>

              <div class="form-group">
                <label>Apellido Paterno *</label>
                <input type="text" id="apellidoPaterno" name="apellidoPaterno" class="form-control" placeholder="Escriba el primer apellido"  required>
              </div>

              <div class="form-group">
                <label>Apellido Materno</label>
                <input type="text" name="apellidoMaterno" class="form-control" placeholder="Escriba el segundo apellido" >
              </div>

              <div class="form-group">
                <label>CI *</label>
                <input type="text" name="ci" class="form-control" placeholder="Escriba su numero de carnet de identidad" minlength="6"  required>
              </div>

              <div class="form-group">
                <label>Login *</label>
                <input type="text" name="login" class="form-control" placeholder="Escriba su Login" minlength="6"  required>
              </div>

              <div class="form-group">
                <label>Password *</label>
                <input type="text" name="password" class="form-control" placeholder="Escriba su Password" minlength="6"  required>
              </div>

              <div class="form-group">
                <label>Direccion</label>
                <input type="text" name="direccion" class="form-control" placeholder="Escriba la dirección">
              </div>

              <div class="form-group">
                <label>Telefono</label>
                <input type="text" name="telefono" class="form-control" placeholder="Escriba el numero de telefono">
              </div>

              <div class="form-group">
                <label>Correo</label>
                <input type="email" name="correo" class="form-control" placeholder="Escriba la dirección">
              </div>

              <div class="form-group">
                <label>Tipo de usuario</label>
                <select class="form-select" name="tipoUsuario" aria-label="seleccionar por defecto">
                    <option value="admin">Admin</option>
                    <option value="vendedor">Vendedor</option>
                </select>
              </div>            
              <button type="submit" class="btn btn-primary">Crear Usuario</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

 <!-- jQuery -->
 <script src="<?php echo base_url(); ?>/adminLte/plugins/jquery/jquery.min.js"></script>
