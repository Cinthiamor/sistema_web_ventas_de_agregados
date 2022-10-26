
<script type="text/javascript">
  function confirm_modal_añadirStock(id,activo)
  {
      var url = '<?php echo base_url() . "producto/añadirStockBd/" ;?>';
      $("#url-addStock").attr('href', url+id+'/'+activo);
      jQuery('#modal-5').modal('show', {backdrop: 'static'});
  }
  function confirm_modal_eliminar(id,activo)
  {
      var url = '<?php echo base_url() . "producto/eliminarProductoBd/" ;?>';
      $("#url-delete").attr('href', url+id+'/'+activo);
      jQuery('#modal-4').modal('show', {backdrop: 'static'});
  }
  function confirm_modal_deshabilitar(id,activo)
  {
      var url = '<?php echo base_url() . "producto/deshabilitarProductoBd/" ;?>';
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
          <h5>Lista de Productos</h5>
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
                    <th>STOCK (m³)</th>
                    <th>AÑADIR STOCK</th>
                    <th>EDITAR</th>
                    <th>ELIMINAR</th>
                    <th>DESHABILITAR</th>
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
                      <!--<td><?php echo $row->img; ?></td>
                      <img class="card-img-top" src="../dist/img/photo1.png" alt="Dist Photo 1">-->
                      <td><?php echo $row->tipoProducto; ?></td>
                      <td><?php echo $row->stock; ?></td>

                      <!-- btn añadir stock -->
                      <td class="text-center">
                        <a href="#"
                          title="Estado Persona" class="btn btn-success btn-xs" onClick="return confirm_modal_añadirStock(<?php echo $row->idProducto; ?>,0)">
                          <i class="fas fa-plus-square"></i>
                        </a>
                      </td>
                      <!-- btn modificar -->
                      <td class="text-center">
                        <?php
                        echo form_open_multipart('producto/modificar');
                        ?>
                        <input type="hidden" name="idProducto" value="<?php echo $row->idProducto; ?>">
                        <button type="submit" class="btn btn-info btn-xs" ><i class="far fa-edit"></i></button>
                        <?php
                        echo form_close();
                        ?>
                      </td>
                      <!-- btn eliminar -->
                      <td class="text-center">
                        <a href="#"
                          title="Estado Persona" class="btn btn-danger btn-xs" onClick="return confirm_modal_eliminar(<?php echo $row->idProducto; ?>,0)">
                          <i class="fas fa-trash-alt"></i>
                        </a>
                      </td>
                      <!-- btn deshabilitar -->
                      <td class="text-center">
                        <a href="#"
                          title="Estado Persona" class="btn btn-warning btn-xs" onClick="return confirm_modal_deshabilitar(<?php echo $row->idProducto; ?>,0)">
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
    <!-- <a href="<?php echo base_url().'index.php/producto/agregar';?>" class="btn btn-success" ><i class="fas fa-plus-square"></i> Crear nuevo Producto</a> -->
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-crear-producto">
    <i class="fas fa-plus-square"></i>   
    Crear nuevo Producto
    </button>
  </div>

</div>

<!--//Modal Confirmacion añadirStock-->
<!-- Modal -->
<div class="modal fade" id="modal-5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Añadir Stock</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form method="post" id="add_create" name="add_create" action="<?= site_url('producto/añadirProducto') ?>">                 
        <div class="form-group">
          <div class="row">
            <div class="col-12">                       
              <label for="stock" class="form-label">Stock a añadir *</label>
              <div class="input-group mb-3">
                <input id="stock" type="text" class="form-control" name="stock" placeholder="Ingrese el Stock del producto a añadir" required>
                <div class="input-group-append">
                  <span class="input-group-text">m³</span>
                </div>
              </div>                                                       
            </div>                  
          </div>                
        </div>            
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Crear Producto</button>
        </div>    
        
      </form>

      </div>
      <div class="modal-footer">
        <!-- <a href="#" id="url-addStock" class="btn btn-success btn-sm"><i class="fa fa-check">&nbsp;</i>Aceptar</a>
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fas fa-times">&nbsp;</i>Cerrar</button> -->
      </div>
    </div>
  </div>
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
        <h5 class="modal-title" id="exampleModalLabel">Deshabilitar al Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Esta seguro que desea deshabilitar al Producto?.
      </div>
      <div class="modal-footer">
        <a href="#" id="url-disabled" class="btn btn-success btn-sm"><i class="fa fa-check">&nbsp;</i>Aceptar</a>
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fas fa-times">&nbsp;</i>Cerrar</button>
      </div>
    </div>
  </div>
</div>


<!-- /.modal -->
<div class="modal fade" id="modal-crear-producto">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">                
            <h4 class="modal-title">Agregar Producto</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
              
            </div>
            <div class="modal-body">
            <form method="post" id="add_create" name="add_create" action="<?= site_url('producto/crearProducto') ?>">

              <div class="form-group">
                <div class="row">
                  <div class="col-md-8">
                    <label for="nombre" class="form-label">Nombre del Producto *</label>
                    <input id="nombre" type="text" name="nombre" class="form-control" placeholder="Escriba el Nombre del producto" required> 
                  </div>
                  <div class="col-md-4">
                    <label>Tipo de producto *</label>
                    <select class="custom-select" name="idTipoProducto" aria-label="seleccionar por defecto" >
                      <option selected>Seleccionar</option>
                      <option value="1">Agregado Fino</option>
                      <option value="2">Agregado Grueso</option>
                    </select>
                  </div> 
                </div>                                
              </div>           

              <div class="form-group">
                <label for="descripcion" class="form-label">Descripcion</label>
                
                <textarea class="form-control" id="descripcion" type="text" name="descripcion" rows="3"></textarea>
              </div>  

              <div class="form-group">
                <div class="row">
                  <div class="col-6">
                    <label for="precio" class="form-label">Precio *</label>
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" name="precio" placeholder="Ingrese el precio por m³ del producto" required>
                      <div class="input-group-append">
                        <span class="input-group-text">Bs.</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-6">                       
                    <label for="stock" class="form-label">Stock inical del Producto *</label>
                    <div class="input-group mb-3">
                      <input id="stock" type="text" class="form-control" name="stock" placeholder="Ingrese el Stock inicial del producto" required>
                      <div class="input-group-append">
                        <span class="input-group-text">m³</span>
                      </div>
                    </div>                                                       
                  </div>                  
                </div>                
              </div>   
              <!--<div class="form-group">
                <label>Imagen</label>
                <div class="custom-file">
                      <input type="file" class="custom-file-input" id="img" name="img">
                      <label class="custom-file-label" for="customFile">Buscar archivo</label>
                    </div>
              </div>-->
              <button type="submit" class="btn btn-primary">Crear Producto</button>
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
