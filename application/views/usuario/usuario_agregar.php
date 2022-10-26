<div class="content-wrapper">
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col col-lg-8">
      
          <div class="card card-primary md-8">
 
            <div class="card-header">
              <label class="card-title">Crear Usuario</label>
            </div>
            <!-- /.card-header -->
          
              <div class="card-body">

                <form method="post" id="add_create" name="add_create" action="<?= site_url('usuario/crearUsuario') ?>">

                  <div class="form-group">
                    <div class="col-md-12">
                      <label for="nombre" class="form-label">Nombre/s *</label>
                      <input id="nombre" type="text" name="nombres" class="form-control" placeholder="Escriba el Nombre" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-6">
                        <label>Primer Apellido *</label>
                        <input type="text" id="primerApellido" name="primerApellido" class="form-control" placeholder="Escriba el primer apellido" required>
                      </div>
                      <div class="col-md-6">
                        <label>Segundo Apellido</label>
                        <input type="text" name="segundoApellido" class="form-control" placeholder="Escriba el segundo apellido">
                      </div>
                    </div>
                  </div>                    

                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-4">
                        <label>Fecha de Nacimiento *</label>
                        <input type="date" class="form-control" name="fechaNacimiento" required>
                      </div> 
                      <div class="col-md-5">
                        <label>Carnet de Identidad *</label>
                        <input type="text" name="ci" class="form-control" placeholder="Escriba su numero de C.I." minlength="6" required>
                      </div>
                      <div class="col-md-3">
                        <label>Genero *</label>
                        <br>
                        <select class="custom-select" name="genero" aria-label="seleccionar por defecto" >
                          <option selected>Seleccionar</option>
                          <option value="M" >Masculino</option>
                          <option value="F" >Femenino</option>
                        </select>
                      </div>
                    </div>                  
                  </div>
                               
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-6">
                        <label>Usuario *</label>
                        <input type="text" name="login" class="form-control" placeholder="Escriba su Login" minlength="6"  required>                
                      </div>
                      <div class="col-md-6">
                        <label>Contraseña *</label>
                        <input type="password" name="password" class="form-control" placeholder="Escriba su Password" minlength="6"  required>
                      </div>
                    </div>                                                        
                  </div>                
                  
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-6">
                        <label>Celular</label>
                        <input type="text" name="celular" class="form-control" placeholder="Escriba el numero de telefono">
                      </div>
                      <div class="col-md-6">
                        <label>Correo electronico</label>
                        <input type="email" name="correo" class="form-control" placeholder="Escriba la dirección">
                      </div>
                    </div>
                  </div> 
                  
                  <div class="form-group">                
                    <div class="row">
                      <div class="col-md-9">
                        <label>Direccion</label>
                        <input type="text" name="direccion" class="form-control" placeholder="Escriba la dirección">                
                      </div>
                      <div class="col-md-3">
                        <label>Tipo de usuario *</label>
                        <br>
                        <select class="custom-select" name="idTipoUsuario" aria-label="seleccionar por defecto" >
                          <option selected>Seleccionar</option>
                          <option value="1" >Admin</option>
                          <option value="2" >Vendedor</option>
                        </select>
                      </div>
                    </div>                
                  </div>
   
                  <p>(*) Campos obligatorios</p>
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
