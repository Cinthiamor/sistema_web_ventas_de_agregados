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
          <ol class="breadcrumb float-sm-right">
            <?php echo form_open_multipart('usuario/logout'); ?>
              <button type="submit" name="buton3" class="btn btn-danger">Cerrar session</button>
              <?php echo form_close(); ?>
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
              <h5>Usuario: <?php echo $this->session->userdata('login'); ?></h5>
              <h5>Tipo: <?php echo $this->session->userdata('tipo'); ?></h5>
              
              <h6>Fecha: <?php echo date('Y/m/d H:i:s'); ?></h6>

              
              <?php
              echo form_open_multipart('usuario/agregar');
              ?>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-xs">Crear Usuario</button>
              </div>
              <?php
              echo form_close();
              ?>
              <?php
              echo form_open_multipart('usuario/deshabilitados');
              ?>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-xs">Ver Usuarios Deshabilitados</button>
              </div>
              <?php
              echo form_close();
              ?>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>NOMBRE</th>
                    <th>AP. PATERNO</th>
                    <th>AP. MATERNO</th>
                    <th>CI</th>
                    <th>DIRECCION</th>
                    <th>TELEFONO</th>
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
                      <th scope="row"><?php echo $indice; ?></th>                      
                      <td><?php echo $row->nombre; ?></th>
                      <td><?php echo $row->apellidoPaterno; ?></td>
                      <td><?php echo $row->apellidoMaterno; ?></td>
                      <td><?php echo $row->ci; ?></td>
                      <td><?php echo $row->direccion; ?></td>
                      <td><?php echo $row->telefono; ?></td>
                      <td><?php echo $row->correo; ?></td>
                      <td><?php echo $row->tipoUsuario; ?></td>
                      <td class="text-center">
                        <?php
                        echo form_open_multipart('usuario/modificar');
                        ?>
                        <input type="hidden" name="idUsuario" value="<?php echo $row->idUsuario; ?>">

                        <button type="submit" class="btn btn-primary btn-xs" ><i class="far fa-edit"></i></button>
                        <?php
                        echo form_close();
                        ?>
                      </td>
                      <td class="text-center">
                        <?php
                        echo form_open_multipart('usuario/eliminarUsuarioBd');
                        ?>
                        <input type="hidden" name="idUsuario" value="<?php echo $row->idUsuario; ?>">
                        
                        <button type="submit" class="btn btn-danger btn-xs" ><i class="fas fa-trash-alt"></i></button>
                        <?php
                        echo form_close();
                        ?>
                      </td>
                      <td class="text-center">
                        <?php
                        echo form_open_multipart('usuario/deshabilitarUsuarioBd');
                        ?>
                        <input type="hidden" name="idUsuario" value="<?php echo $row->idUsuario; ?>">
                        
                        <button type="submit" class="btn btn-warning btn-xs" ><i class="fa fa-thumbs-down"></i></button>
                        <?php
                        echo form_close();
                        ?>
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
</div>