
<script type="text/javascript">
  function confirm_modal_eliminar(id,activo)
  {
      var url = '<?php echo base_url() . "venta/eliminarVentaBd/" ;?>';
      $("#url-delete").attr('href', url+id+'/'+activo);
      jQuery('#modal-4').modal('show', {backdrop: 'static'});

  }
</script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h5>Lista de Ventas</h5>
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
                    <th>Nº DE COMPROBANTE</th>
                    <th>NOMBRE O RAZON SOCIAL</th>                    
                    <th>NIT o CI</th>
                    <th>FECHA DE VENTA</th>
                    <th>PRODUCTO/S</th>
                    <th>PRECIO UNITARIO</th>
                    <th>CANTIDAD</th>
                    <th>PRECIO TOTAL</th>
                    <th>IMPRIMIR RECIBO</th>
                    <th>ANULAR VENTA</th>
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
                      <!-- btn imprimir recibo -->
                      <td class="text-center">
                        <a href="<?php echo base_url().'venta/notaDeVenta/'.$row->idVenta;?>" class="btn btn-dark btn-xs" target="_blank">                          
                          <i class="fas fa-file-pdf"></i>
                        </a>                       
                      </td>    
                      <!-- btn eliminar -->
                      <td class="text-center">
                        <a href="#"
                          title="Estado Persona" class="btn btn-danger btn-xs" onClick="return confirm_modal_eliminar(<?php echo $row->idVenta; ?>,0)">
                          <i class="fas fa-ban"></i>
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
    <a href="<?php echo base_url().'index.php/venta/agregar';?>" class="btn btn-success" ><i class="fas fa-plus-square"></i> Generar nueva venta</a>
<!--     <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-crear-usuarios">
      <i class="fas fa-plus-square"></i> 
      Generar nueva venta
    </button> -->
  </div>
</div>

<!--//Modal Confirmacion Eliminar-->
<!-- Modal -->
<div class="modal fade" id="modal-4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Anular Venta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Esta seguro que desea Anulas la venta?.
      </div>
      <div class="modal-footer">
        <a href="#" id="url-delete" class="btn btn-success btn-sm"><i class="fa fa-check">&nbsp;</i>Aceptar</a>
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fas fa-times">&nbsp;</i>Cerrar</button>
      </div>
    </div>
  </div>
</div>