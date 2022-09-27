<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h5>Lista de Usuarios Deshabilitados</h5>
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
            <div class="card-header">
            <!-- /.card-header -->
            <div class="card-body">              
              <?php
              echo form_open_multipart('usuario/index');
              ?>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-xs">Ver Usuarios Habilitados</button>
              </div>
              <?php
              echo form_close();
              ?>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>NOMBRE</th>
                    <th>AP. PATERNO</th>
                    <th>AP. MATERNO</th>
                    <th>CI</th>
                    <th>DIRECCION</th>
                    <th>TELEFONO</th>
                    <th>CORREO</th>
                    <th>TIPO</th>
                    <th>HABILITAR</th>
                  </tr>
                </thead>
                <tbody>

                  <?php
                  foreach ($usuario->result() as $row) {
                  ?>
                    <tr>
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
                        echo form_open_multipart('Usuario/habilitarUsuarioBd');
                        ?>
                        <input type="hidden" name="idUsuario" value="<?php echo $row->idUsuario; ?>">
                        
                        <button type="submit" class="btn btn-success btn-xs" ><i class="fa fa-thumbs-up"></i></button>
                        <?php
                        echo form_close();
                        ?>
                      </td>
                      
                    </tr>
                  <?php
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