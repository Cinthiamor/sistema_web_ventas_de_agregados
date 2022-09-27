<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cliente extends CI_Controller
{
 
  
  public function index()
    {
    $lista = $this->cliente_model->lista();
    $data['cliente'] = $lista;

		$this->load->view('inc_header');
        $this->load->view('inc_menu');
		$this->load->view('cliente/cliente_lista',$data);
		$this->load->view('inc_footer');
	}
  
  public function agregar()
  {
    $this->load->view('inc_header');
    $this->load->view('inc_menu');
    $this->load->view('cliente/cliente_agregar');
    $this->load->view('inc_footer');
  }

  public function crearCliente()
  {
    $data['nombre_razonSocial'] = $_POST['nombre_razonSocial'];   
    $data['nit_carnet'] = $_POST['nit_carnet'];    
    $data['direccion'] = $_POST['direccion'];
    $data['telefono'] = $_POST['telefono'];
    $this->cliente_model->crearCliente($data);
    redirect('cliente/index', 'refresh');
  }

  public function modificar()
  {
    $idCliente = $_POST['idCliente'];
    $data['infoCliente'] = $this->cliente_model->recuperarCliente($idCliente);

    $this->load->view('inc_header');
    $this->load->view('inc_menu');
    $this->load->view('cliente/cliente_modificar', $data);
    $this->load->view('inc_footer');
  }

  public function modificarCliente()
  {
    $idCliente = $_POST['idCliente'];
    $data['nombre_razonSocial'] = $_POST['nombre_razonSocial'];    
    $data['nit_carnet'] = $_POST['nit_carnet'];
    $data['direccion'] = $_POST['direccion'];
    $data['telefono'] = $_POST['telefono'];
   
    $this->cliente_model->modificarCliente($idCliente, $data);
    redirect('cliente/index', 'refresh');
  }

  public function eliminarClienteBd()
  { 
    $idCliente = $_POST['idCliente'];
    $this->cliente_model->eliminarCliente($idCliente);
    redirect('cliente/index', 'refresh');
  }
  public function deshabilitarClienteBd()
	{		
        $idCliente=$_POST['idCliente'];
        $data['estado']='0';

        $this->cliente_model->modificarCliente($idCliente,$data);
        redirect('cliente/index','refresh');
	}
  public function habilitarClienteBd()
	{		
        $idCliente=$_POST['idCliente'];
        $data['estado']='1';

        $this->cliente_model->modificarCliente($idCliente,$data);
        redirect('cliente/deshabilitados','refresh');
	}

  public function deshabilitados()
  {
    $lista = $this->cliente_model->listadeshabilitados();
    $data['cliente'] = $lista;

    $this->load->view('inc_header');
    $this->load->view('inc_menu');
    $this->load->view('cliente/cliente_deshabilitados', $data);
    $this->load->view('inc_footer');
  }
 
}
