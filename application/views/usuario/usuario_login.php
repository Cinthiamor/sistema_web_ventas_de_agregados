<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h5>Logueo de Usuarios</h5>
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
      <div class="row justify-content-md-center">
            <div class="col col-lg-6">
                <div class="card">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Inicie Sesion</h3>
                        </div>
                        <!-- /.card-header -->

                        <!-- form start -->
                        <?php
                        echo form_open_multipart('usuario/validar',array('id'=>'form1'))
                        ?>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Usuario</label>
                                    <input type="text" name="login" class="form-control" id="exampleInputEmail1" placeholder="Ingrese su Login">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Contraseña</label>
                                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Ingrese su Password">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Ingresar</button>
                            </div>
                        <?php
                        echo form_close();
                        ?>
                        <?php
                        switch ($msg) {
                          case '1':
                            $message="Gracias por usar el sistema";
                            break;
                          case '2':
                            $message="Usuario no identificado";
                            break;
                          case '3':
                            $message="Acceso no valido - favor iniciar sesion" ;
                            break;
                          default:
                            $message="";
                            break;
                        }
                        ?>
                        <?php
                        if ($message!="")
                        {
                          ?>
                          <div class="alert alert-danger text-center">
                            <h5><?php echo $message;?></h5>
                          </div>
                          <?php
                        }

                        ?>


                    </div>            
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