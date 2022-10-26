
<script type="text/javascript">
  function confirm_modal_eliminar(id,activo)
  {
      var url = '<?php echo base_url() . "usuario/eliminarUsuarioBd/" ;?>';
      $("#url-delete").attr('href', url+id+'/'+activo);
      jQuery('#modal-4').modal('show', {backdrop: 'static'});

  }
  function confirm_modal_deshabilitar(id,activo)
  {
      var url = '<?php echo base_url() . "usuario/deshabilitarUsuarioBd/" ;?>';
      $("#url-disabled").attr('href', url+id+'/'+activo);
      jQuery('#modal-3').modal('show', {backdrop: 'static'});

  }
</script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h5>Lista de Usuarios</h5>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>index.php/usuario/index" class="nav-link">Inicio</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>NOMBRE</th>
                    <th>PRIMER AP.</th>
                    <th>SEGUNDO AP.</th>
                    <th>FECHA NACIMIENTO AP.</th>
                    <th>CI</th>
                    <th>GENERO</th>                    
                    <th>CELULAR</th>
                    <th>DIRECCION</th>
                    <th>CORREO</th>
                    <th>TIPO</th>
                    <th>EDITAR</th>
                    <th>ELIMINAR</th>
                    <th>DESHABILITAR</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $indice = 1;
                  foreach ($usuario->result() as $row) {
                  ?>
                    <tr>
                      <td scope="row"><?php echo $indice; ?></td>                      
                      <td><?php echo $row->nombres; ?></td>
                      <td><?php echo $row->primerApellido; ?></td>
                      <td><?php echo $row->segundoApellido; ?></td>
                      <td><?php echo $row->fechaNacimiento; ?></td>
                      <td><?php echo $row->ci; ?></td>
                      <td><?php echo $row->genero; ?></td>
                      <td><?php echo $row->celular; ?></td>
                      <td><?php echo $row->direccion; ?></td>                      
                      <td><?php echo $row->correo; ?></td>
                      <td><?php echo $row->tipoUsuario; ?></td>
                      <td class="text-center">
                        <?php
                        echo form_open_multipart('usuario/modificar');
                        ?>
                        <input type="hidden" name="idUsuario" value="<?php echo $row->idUsuario; ?>">
                        <button type="submit" class="btn btn-info btn-xs" ><i class="far fa-edit"></i></button>
                        <?php
                        echo form_close();
                        ?>
                      </td>
                      <!-- btn eliminar -->
                      <td class="text-center">
                        <a href="#"
                          title="Estado Persona" class="btn btn-danger btn-xs" onClick="return confirm_modal_eliminar(<?php echo $row->idUsuario; ?>,0)">
                          <i class="fas fa-trash-alt"></i>
                        </a>
                      </td>
                      <!-- btn deshabilitar -->
                      <td class="text-center">
                        <a href="#"
                          title="Estado Persona" class="btn btn-warning btn-xs" onClick="return confirm_modal_deshabilitar(<?php echo $row->idUsuario; ?>,0)">
                          <i class="fa fa-thumbs-down"></i>
                        </a>
                      </td>
                      
                    </tr>
                  <?php
                  $indice++;
                  }
                  ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
  <div class="text-center">
    <!-- <a href="<?php echo base_url().'index.php/usuario/agregar';?>" class="btn btn-success" ><i class="fas fa-plus-square"></i> Crear nuevo Usuario</a> -->
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-crear-usuarios">
      <i class="fas fa-plus-square"></i> 
      Crear nuevo Usuario
    </button>
  </div>
</div>



<!--//Modal Confirmacion Eliminar-->
<!-- Modal -->
<div class="modal fade" id="modal-4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar al Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Esta seguro que desea elimiar al Usuario?.
      </div>
      <div class="modal-footer">
        <a href="#" id="url-delete" class="btn btn-success btn-sm"><i class="fa fa-check">&nbsp;</i>Aceptar</a>
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fas fa-times">&nbsp;</i>Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!--//Modal Confirmacion Deshabilitar-->
<!-- Modal -->
<div class="modal fade" id="modal-3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Deshabilitar al Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Esta seguro que desea deshabilitar al Usuario?.
      </div>
      <div class="modal-footer">
        <a href="#" id="url-disabled" class="btn btn-success btn-sm"><i class="fa fa-check">&nbsp;</i>Aceptar</a>
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fas fa-times">&nbsp;</i>Cerrar</button>
      </div>
    </div>
  </div>
</div>


<!-- /.modal -->
<div class="modal fade" id="modal-crear-usuarios">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">                
            <h4 class="modal-title">Agregar Usuario</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
              
            </div>
            <div class="modal-body">
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

            <div class="modal-footer">    


            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
