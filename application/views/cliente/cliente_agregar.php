<div class="content-wrapper">
  <div class="container-fluid">
    <div class="row justify-content-md-center">
      <div class="col col-lg-6">

        <div class="card card-primary mt-3">
          <div class="card-header">
            <label class="card-title">Crear Cliente</label>
          </div>
          <!-- /.card-header -->
          <div class="card-body">

            <form method="post" id="add_create" name="add_create" action="<?= site_url('cliente/crearCliente') ?>">

              <div class="form-group">
                <label for="nombre" class="form-label">Nombre/s o Razon Social *</label>
                <input id="nombre" type="text" name="nombres" class="form-control" placeholder="Escriba el Nombre" required>
              </div>              

              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <label for="nombre" class="form-label">Primer Apellido</label>
                    <input id="primerAp" type="text" name="primerApellido" class="form-control" placeholder="Escriba el Primer Apellido">
                  </div>
                  <div class="col-md-6">
                    <label for="nombre" class="form-label">Segundo Apellido</label>
                    <input id="segundoAp" type="text" name="segundoApellido" class="form-control" placeholder="Escriba el segundo Apellido">
                  </div>
                </div>
              </div> 

              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <label>NIT o Carnet de Identidad *</label>
                    <input type="text" name="nit_carnet" class="form-control" placeholder="Escriba su numero de carnet de identidad" minlength="6"  required>
                  </div>
                  <div class="col-md-6">
                    <label>Telefono</label>
                    <input type="text" name="telefono" class="form-control" placeholder="Escriba el numero de telefono">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label>Direccion</label>
                <input type="text" name="direccion" class="form-control" placeholder="Escriba la dirección">
              </div>
              <p>(*) Campos obligatorios</p>           
              <button type="submit" class="btn btn-primary">Crear Cliente</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

 <!-- jQuery -->
 <script src="<?php echo base_url(); ?>/adminLte/plugins/jquery/jquery.min.js"></script>
