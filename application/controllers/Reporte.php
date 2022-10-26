<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reporte extends CI_Controller
{
 
  function __construct()
  {
      parent::__construct();

      require_once  APPPATH.'controllers/PDF_MC_Table.php';
  }
  
  public function index() {
  }

  public function ventas() {
    $startDate = null; 
    $endDate = null;
    $lista = $this->venta_model->obtenerTodasVentasPorFecha($startDate, $endDate);

    $data['venta'] = $lista;
    $this->load->view('inc_header');
    $this->load->view('inc_menu');
    $this->load->view('reporte/reporte_ventas', $data); 
    $this->load->view('inc_footer');
  }
  
  public function buscarventaporfecha() {
    if ($_POST['startDate']!= null )
    {
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];
        $lista = $this->venta_model->obtenerTodasVentasPorFecha($startDate, $endDate);
        //Agregar lista de productos $this->detalleVenta_model->recuperarDetalleVentaProducto($idVenta);
        echo (json_encode($lista));
    } 
  }
}
