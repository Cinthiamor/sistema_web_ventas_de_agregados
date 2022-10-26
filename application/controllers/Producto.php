<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Producto extends CI_Controller
{
 
  
  public function index()
    {
    $lista = $this->producto_model->lista();
    $data['producto'] = $lista;

		$this->load->view('inc_header');
    $this->load->view('inc_menu');
		$this->load->view('producto/producto_lista',$data);
		$this->load->view('inc_footer');
	}
  
  public function agregar()
  {
    $this->load->view('inc_header');
    $this->load->view('inc_menu');
    $this->load->view('producto/producto_agregar');
    $this->load->view('inc_footer');
  }

  public function crearProducto()
  {
    $data['nombre'] = $_POST['nombre'];   
    $data['descripcion'] = $_POST['descripcion']; 
    $data['precio'] = $_POST['precio'];      
    $data['stock'] = $_POST['stock'];
    //$data['img'] = $_POST['img'];   
    $data['idTipoProducto'] = $_POST['idTipoProducto'];
    $this->producto_model->crearProducto($data);
    redirect('producto/index', 'refresh');
  }

  public function modificar()
  {
    $idProducto = $_POST['idProducto'];
    $data['infoProducto'] = $this->producto_model->recuperarProducto($idProducto);

    $this->load->view('inc_header');
    $this->load->view('inc_menu');
    $this->load->view('producto/producto_modificar', $data);
    $this->load->view('inc_footer');
  }

  public function modificarProducto()
  {
    $idProducto = $_POST['idProducto'];
    $data['nombre'] = $_POST['nombre'];    
    $data['descripcion'] = $_POST['descripcion']; 
    $data['precio'] = $_POST['precio']; 
    $data['stock'] = $_POST['stock'];
    //$data['img'] = $_POST['img'];
    $data['idTipoProducto'] = $_POST['idTipoProducto'];    
   
    $this->producto_model->modificarProducto($idProducto, $data);
    redirect('producto/index', 'refresh');
  }

  public function eliminarProductoBd($idProducto, $estado)
  { 
    /* $idProducto = $_POST['idProducto']; */
    $this->producto_model->eliminarProducto($idProducto, $estado);
    redirect('producto/index', 'refresh');
  }

  public function deshabilitarProductoBd($idProducto)
	{		
        /* $idProducto=$_POST['idProducto']; */
        $data['habilitado']='0';

        $this->producto_model->modificarProducto($idProducto,$data);
        redirect('producto/index','refresh');
	}
  
  public function habilitarProductoBd($idProducto)
	{		
        /* $idProducto=$_POST['idProducto']; */
        $data['deshabilitado']='1';

        $this->producto_model->modificarProducto($idProducto,$data);
        redirect('producto/deshabilitados','refresh');
	}

  public function deshabilitados()
  {
    $lista = $this->producto_model->listadeshabilitados();
    $data['producto'] = $lista;

    $this->load->view('inc_header');
    $this->load->view('inc_menu');
    $this->load->view('producto/producto_deshabilitados', $data);
    $this->load->view('inc_footer');
  }
 
}
