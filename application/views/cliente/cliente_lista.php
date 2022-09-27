<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h5>Lista de Clientes</h5>
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
              echo form_open_multipart('cliente/agregar');
              ?>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-xs">Crear Cliente</button>
              </div>
              <?php
              echo form_close();
              ?>
              <?php
              echo form_open_multipart('cliente/deshabilitados');
              ?>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-xs">Ver Clientes Deshabilitados</button>
              </div>
              <?php
              echo form_close();
              ?>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>NOMBRE O RAZON SOCIAL</th>
                    <th>NIT O CARNET</th>
                    <th>DIRECCION</th>
                    <th>TELEFONO</th>
                    <th>EDITAR</th>
                    <th>ELIMINAR</th>
                    <th>DESHABILITAR</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $indice = 1;
                  foreach ($cliente->result() as $row) {
                  ?>
                    <tr>
                      <th scope="row"><?php echo $indice; ?></th>                      
                      <td><?php echo $row->nombre_razonSocial; ?></th>
                      <td><?php echo $row->nit_carnet; ?></td>
                      <td><?php echo $row->direccion; ?></td>
                      <td><?php echo $row->telefono; ?></td>
                      <td class="text-center">
                        <?php
                        echo form_open_multipart('cliente/modificar');
                        ?>
                        <input type="hidden" name="idCliente" value="<?php echo $row->idCliente; ?>">
                        <button type="submit" class="btn btn-primary btn-xs" ><i class="far fa-edit"></i></button>
                        <?php
                        echo form_close();
                        ?>
                      </td>
                      <td class="text-center">
                        <?php
                        echo form_open_multipart('cliente/eliminarClienteBd');
                        ?>
                        <input type="hidden" name="idCliente" value="<?php echo $row->idCliente; ?>">                        
                        <button type="submit" class="btn btn-danger btn-xs" ><i class="fas fa-trash-alt"></i></button>
                        <?php
                        echo form_close();
                        ?>
                      </td>
                      <td class="text-center">
                        <?php
                        echo form_open_multipart('cliente/deshabilitarClienteBd');
                        ?>
                        <input type="hidden" name="idCliente" value="<?php echo $row->idCliente; ?>">
                        
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