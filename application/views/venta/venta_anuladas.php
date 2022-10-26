<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h5>Lista de Ventas Anuladas</h5>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>index.php/producto/index" class="nav-link">Inicio</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  
  <!-- /.content -->
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
                    <th>Nº DE COMPROBANTE</th>
                    <th>NOMBRES O RAZON SOCIAL</th>                    
                    <th>CARNET DE IDENTIDAD</th>
                    <th>FECHA DE LA VENTA</th>
                    <th>PRODUCTO/S</th>
                    <th>PRECIO UNITARIO</th>
                    <th>CANTIDAD</th>
                    <th>PRECIO TOTAL</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $indice = 1;
                  foreach ($venta->result() as $row) {
                  ?>
                    <tr>
                      <td scope="row"><?php echo $indice; ?></td>
                      <td><?php echo $row->nroComprobante; ?></td>
                      <td><?php echo $row->nombres; ?></td>
                      <td><?php echo $row->nit_carnet; ?></td>
                      <td><?php echo $row->fecha; ?></td>
                      <td><?php echo $row->nombre; ?></td>
                      <td><?php echo $row->precio; ?></td>
                      <td><?php echo $row->cantidad; ?></td>
                      <td><?php echo $row->total; ?></td>                   
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