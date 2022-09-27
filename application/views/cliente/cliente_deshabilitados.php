<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h5>Lista de Clientes Deshabilitados</h5>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>index.php/cliente/index" class="nav-link">Inicio</a></li>
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
              echo form_open_multipart('cliente/index');
              ?>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-xs">Ver Clientes Habilitados</button>
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
                    <th>HABILITAR</th>
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
                        echo form_open_multipart('Cliente/habilitarClienteBd');
                        ?>
                        <input type="hidden" name="idCliente" value="<?php echo $row->idCliente; ?>">
                        
                        <button type="submit" class="btn btn-success btn-xs" ><i class="fa fa-thumbs-up"></i></button>
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