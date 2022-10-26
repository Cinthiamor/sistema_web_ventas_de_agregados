<script type="text/javascript">
  function confirm_modal_eliminar(id,activo)
  {
      var url = '<?php echo base_url() . "producto/eliminarProductoBd/" ;?>';
      $("#url-delete").attr('href', url+id+'/'+activo);
      jQuery('#modal-4').modal('show', {backdrop: 'static'});

  }
  function confirm_modal_habilitar(id,activo)
  {
      var url = '<?php echo base_url() . "producto/habilitarProductoBd/" ;?>';
      $("#url-enabled").attr('href', url+id+'/'+activo);
      jQuery('#modal-3').modal('show', {backdrop: 'static'});

  }
</script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h5>Lista de Productos Deshabilitados</h5>
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
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>NOMBRE DEL PRODUCTO</th>
                    <th>DESCRIPCION</th>                    
                    <th>PRECIO</th>
                    <!--<th>IMAGEN</th>-->
                    <th>TIPO</th>
                    <th>ELIMINAR</th>
                    <th>HABILITAR</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $indice = 1;
                  foreach ($producto->result() as $row) {
                  ?>
                    <tr>
                      <td scope="row"><?php echo $indice; ?></td>
                      <td><?php echo $row->nombre; ?></td>
                      <td><?php echo $row->descripcion; ?></td>
                      <td><?php echo $row->precio; ?></td>
                      <!--<td><?php echo $row->img; ?></td>-->
                      <td><?php echo $row->tipoProducto; ?></td>
                      <!-- btn eliminar -->
                      <td class="text-center">
                        <a href="#"
                          title="Estado Persona" class="btn btn-danger btn-xs" onClick="return confirm_modal_eliminar(<?php echo $row->idProducto; ?>,0)">
                          <i class="fas fa-trash-alt"></i>
                        </a>
                      </td>
                       <!-- btn habilitar -->
                       <td class="text-center">
                        <a href="#"
                          title="Estado Persona" class="btn btn-success btn-xs" onClick="return confirm_modal_habilitar(<?php echo $row->idProducto; ?>,0)">
                          <i class="fa fa-thumbs-up"></i>
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
</div>

<!--//Modal Confirmacion Eliminar-->
<!-- Modal -->
<div class="modal fade" id="modal-4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar al Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Esta seguro que desea elimiar al Producto?.
      </div>
      <div class="modal-footer">
        <a href="#" id="url-disabled" class="btn btn-success btn-sm"><i class="fa fa-check">&nbsp;</i>Aceptar</a>
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
        <h5 class="modal-title" id="exampleModalLabel">Habilitar al Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Esta seguro que desea habilitar el Producto?.
      </div>
      <div class="modal-footer">
        <a href="#" id="url-disabled" class="btn btn-success btn-sm"><i class="fa fa-check">&nbsp;</i>Aceptar</a>
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fas fa-times">&nbsp;</i>Cerrar</button>
      </div>
    </div>
  </div>
</div>