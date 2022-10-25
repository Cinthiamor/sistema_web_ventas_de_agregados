
<script type="text/javascript">
  
  function modal_editar(id,activo)
  {
      var url = '<?php echo base_url() . "cliente/modificar_recuperar/" ;?>';
      $("#url-delete").attr('href', url+id+'/'+activo);
      jQuery('#modal-2').modal('show', {backdrop: 'static'});

  }
  function confirm_modal_deshabilitar(id,activo)
  {
      var url = '<?php echo base_url() . "cliente/deshabilitarClienteBd/" ;?>';
      $("#url-disabled").attr('href', url+id+'/'+activo);
      jQuery('#modal-3').modal('show', {backdrop: 'static'});

  }
  function confirm_modal_eliminar(id,activo)
  {
      var url = '<?php echo base_url() . "cliente/eliminarClienteBd/" ;?>';
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
          <h5>Lista de Clientes</h5>
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
                      <td scope="row"><?php echo $indice; ?></td>                      
                      <td><?php echo $row->nombre_razonSocial; ?></td>
                      <td><?php echo $row->nit_carnet; ?></td>
                      <td><?php echo $row->direccion; ?></td>
                      <td><?php echo $row->telefono; ?></td>
                      <td class="text-center">
                        <?php
                        echo form_open_multipart('cliente/modificar');
                        ?>
                        <input type="hidden" name="idCliente" value="<?php echo $row->idCliente; ?>">
                        <button type="submit" class="btn btn-info btn-xs" ><i class="far fa-edit"></i></button>
                        <?php
                        echo form_close();
                        ?>
                        <!-- <a href="#"
                          title="Estado Persona" class="btn btn-info btn-xs" onClick="return modal_editar(<?php echo $row->idCliente; ?>,0)">
                          <i class="far fa-edit"></i>
                        </a> -->
                      </td>
                      <!-- btn eliminar -->
                      <td class="text-center">
                        <a href="#"
                          title="Estado Persona" class="btn btn-danger btn-xs" onClick="return confirm_modal_eliminar(<?php echo $row->idCliente; ?>,0)">
                          <i class="fas fa-trash-alt"></i>
                        </a>
                      </td>
                      <!-- btn deshabilitar -->
                      <td class="text-center">
                        <a href="#"
                          title="Estado Persona" class="btn btn-warning btn-xs" onClick="return confirm_modal_deshabilitar(<?php echo $row->idCliente; ?>,0)">
                          <i class="fa fa-thumbs-down"></i>
                        </a>
                      </td>

                      <!-- <td class="text-center">
                        <?php
                        echo form_open_multipart('cliente/deshabilitarClienteBd');
                        ?>
                        <input type="hidden" name="idCliente" value="<?php echo $row->idCliente; ?>">
                        
                        <button type="submit" class="btn btn-warning btn-xs" ><i class="fa fa-thumbs-down"></i></button>
                        <?php
                        echo form_close();
                        ?>
                      </td> -->
                      
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
    <!-- <a href="<?php echo base_url().'index.php/cliente/agregar';?>" class="btn btn-success" ><i class="fas fa-plus-square"></i> Crear nuevo Cliente</a> -->
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-crear-clientes">
      <i class="fas fa-plus-square"></i> 
      Crear nuevo Cliente
    </button>
  </div>
</div>
<!--//Modal Editar-->
<!-- Modal -->
<div class="modal fade" id="modal-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar al Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <!-- ¿Esta seguro que desea modificar los daatos del Cliente?. -->
        <div class="card card-primary mt-3">
          <div class="card-header">
            <h3 class="card-title">Actualizar Cliente</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form method="post" id="add_create" name="add_create" action="<?= site_url('cliente/modificarCliente') ?>">
              <div class="form-group">
                <label>Nombre o Razon social *</label>
                <input type="text" name="nombres" class="form-control" value="<?php echo $row->nombres; ?>" required>
                <input type="hidden" name="idCliente" class="form-control" value="<?php echo $row->idCliente; ?>">
              </div>

              <div class="form-group">
                <label>Primer Apellido</label>
                <input type="text" name="primerApellido" class="form-control" value="<?php echo $row->primerApellido; ?>">                  
              </div>

              <div class="form-group">
                <label>Segundo Apellido</label>
                <input type="text" name="segundoApellido" class="form-control" value="<?php echo $row->segundoApellido; ?>">                 
              </div>
              
              <div class="form-group">
                <label>NIT o Carnet de Identidad *</label>
                <input type="text" name="nit_carnet" class="form-control" value="<?php echo $row->nit_carnet; ?>" minlength="6" required>
              </div>

              <div class="form-group">
                <label>Direccion</label>
                <input type="text" name="direccion" class="form-control" value="<?php echo $row->direccion; ?>">
              </div>

              <div class="form-group">
                <label>Telefono</label>
                <input type="text" name="telefono" class="form-control" value="<?php echo $row->telefono; ?>">
              </div>                

              <div class="form-group">
                <button type="submit" class="btn btn-primary" onclick="return confirm('Usted quiere actualizar los datos de cliente?');">Guardar</button>
              </div>
            </form>
          </div>
        </div>
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
        <h5 class="modal-title" id="exampleModalLabel">Deshabilitar al Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Esta seguro que desea deshabilitar al Cliente?.
      </div>
      <div class="modal-footer">
        <a href="#" id="url-disabled" class="btn btn-success btn-sm"><i class="fa fa-check">&nbsp;</i>Aceptar</a>
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fas fa-times">&nbsp;</i>Cerrar</button>
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
        <h5 class="modal-title" id="exampleModalLabel">Eliminar al Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Esta seguro que desea elimiar al Cliente?.
      </div>
      <div class="modal-footer">
        <a href="#" id="url-delete" class="btn btn-success btn-sm"><i class="fa fa-check">&nbsp;</i>Aceptar</a>
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fas fa-times">&nbsp;</i>Cerrar</button>
      </div>
    </div>
  </div>
</div>



<!-- /.modal -->
<div class="modal fade" id="modal-crear-clientes">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">                
            <h4 class="modal-title">Agregar Cliente</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
              
            </div>
            <div class="modal-body">
              <form method="post" id="add_create" name="add_create" action="<?= site_url('cliente/crearCliente') ?>">

                <div class="form-group">
                  <label for="nombre" class="form-label">Nombre/s o Razon Social *</label>
                  <input id="nombre" type="text" name="nombres" class="form-control" placeholder="Escriba el Nombre" required>
                </div>              

                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6">
                      <label for="nombre" class="form-label">Primer Apellido</label>
                      <input id="primerAp" type="text" name="primerApellido" class="form-control" placeholder="Escriba el Primer Apellido">
                    </div>
                    <div class="col-md-6">
                      <label for="nombre" class="form-label">Segundo Apellido</label>
                      <input id="segundoAp" type="text" name="segundoApellido" class="form-control" placeholder="Escriba el segundo Apellido">
                    </div>
                  </div>
                </div> 

                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6">
                      <label>NIT o Carnet de Identidad *</label>
                      <input type="text" name="nit_carnet" class="form-control" placeholder="Escriba su numero de carnet de identidad" minlength="6"  required>
                    </div>
                    <div class="col-md-6">
                      <label>Telefono</label>
                      <input type="text" name="telefono" class="form-control" placeholder="Escriba el numero de telefono">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label>Direccion</label>
                  <input type="text" name="direccion" class="form-control" placeholder="Escriba la dirección">
                </div>
                <p>(*) Campos obligatorios</p>    
                <button type="submit" class="btn btn-primary">Crear Cliente</button>       
                
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