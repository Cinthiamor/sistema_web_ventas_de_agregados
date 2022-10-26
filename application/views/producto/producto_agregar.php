<div class="content-wrapper">
  <div class="container-fluid">
    <div class="row justify-content-md-center">
      <div class="col col-lg-6">

        <div class="card card-primary mt-3">
          <div class="card-header">
            <label class="card-title">Crear Producto</label>
          </div>
          <!-- /.card-header -->
          <div class="card-body">

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
        </div>
      </div>
    </div>
  </div>
</div>

 <!-- jQuery -->
 <script src="<?php echo base_url(); ?>/adminLte/plugins/jquery/jquery.min.js"></script>
