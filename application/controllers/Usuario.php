<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuario extends CI_Controller
{
 
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $data['msg']=$this->uri->segment(3);
    

		if($this->session->userdata('login'))
		{
			redirect('usuario/panel','refresh');
		}
		else
		{
			$this->load->view('inc_header');
      $this->load->view('inc_menu');
      $this->load->view('usuario/usuario_login', $data);
      $this->load->view('inc_footer');
		} 
  }
  public function listaUsuario()
	{
    $lista = $this->usuario_model->lista();
    $data['usuario'] = $lista;

		$this->load->view('inc_header');
    $this->load->view('inc_menu');
		$this->load->view('usuario/usuario_lista',$data);
		$this->load->view('inc_footer');
	}
  public function guest()
	{
		
		$this->load->view('inc_header');
    $this->load->view('inc_menu');
		$this->load->view('usuario/guest');
		$this->load->view('inc_footer');		
	}
  public function validar()
	{
		$login=$_POST['login'];
		$password=md5($_POST['password']);

		$consulta=$this->usuario_model->validar($login,$password);

		if($consulta->num_rows()>0)
		{
			foreach($consulta->result() as $row)
			{
				$newdata = array(
					'idusuario'  => $row->idUsuario,
					'login'     => $row->login,
					'tipo' => $row->tipoUsuario
				);

				$this->session->set_userdata($newdata);
				// $this->session->set_userdata('idusuario',$row->idUsuario);
				// $this->session->set_userdata('login',$row->login);
				// $this->session->set_userdata('tipo',$row->tipo);				
				redirect('usuario/panel','refresh');
			}
		}
		else
		{
			redirect('usuario/index/2','refresh');
		}		
	}
	public function panel()
	{
		if($this->session->userdata('login'))
		{
			if ($this->session->userdata('tipo')=='admin')
			{
				redirect('usuario/listaUsuario','refresh');
			}
			else{
				redirect('usuario/guest','refresh');
			}
		}
		else
		{
			redirect('usuario/index/3','refresh');
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('usuario/index/1','refresh');
	}
  public function agregar()
  {
    $this->load->view('inc_header');
    $this->load->view('inc_menu');
    $this->load->view('usuario/usuario_agregar');
    $this->load->view('inc_footer');
  }

  public function crearUsuario()
  {
    $data['nombre'] = $_POST['nombre'];
    $data['apellidoPaterno'] = $_POST['apellidoPaterno'];
    $data['apellidoMaterno'] = $_POST['apellidoMaterno'];
    $data['ci'] = $_POST['ci'];
    $data['login'] = $_POST['login'];
    $data['password'] = $_POST['password'];
    $data['direccion'] = $_POST['direccion'];
    $data['telefono'] = $_POST['telefono'];
    $data['correo'] = $_POST['correo'];
    $data['tipoUsuario'] = $_POST['tipoUsuario'];

    $this->usuario_model->crearUsuario($data);
    redirect('usuario/index', 'refresh');
  }

  public function modificar()
  {
    $idUsuario = $_POST['idUsuario'];
    $data['infoUsuario'] = $this->usuario_model->recuperarUsuario($idUsuario);

    $this->load->view('inc_header');
    $this->load->view('inc_menu');
    $this->load->view('usuario/usuario_modificar', $data);
    $this->load->view('inc_footer');
  }

  public function modificarUsuario()
  {
    $idUsuario = $_POST['idUsuario'];
    $data['nombre'] = $_POST['nombre'];
    $data['apellidoPaterno'] = $_POST['apellidoPaterno'];
    $data['apellidoMaterno'] = $_POST['apellidoMaterno'];
    $data['ci'] = $_POST['ci'];
    $data['direccion'] = $_POST['direccion'];
    $data['telefono'] = $_POST['telefono'];
    $data['correo'] = $_POST['correo'];
    $data['tipoUsuario'] = $_POST['tipoUsuario'];

    $this->usuario_model->modificarUsuario($idUsuario, $data);
    redirect('usuario/index', 'refresh');
  }

  public function eliminarUsuarioBd()
  { 
    $idUsuario = $_POST['idUsuario'];
    $this->usuario_model->eliminarUsuario($idUsuario);
    redirect('usuario/index', 'refresh');
  }
  public function deshabilitarUsuarioBd()
	{		
        $idUsuario=$_POST['idUsuario'];
        $data['estado']='0';

        $this->usuario_model->modificarUsuario($idUsuario,$data);
        redirect('usuario/index','refresh');
	}
  public function habilitarUsuarioBd()
	{		
        $idUsuario=$_POST['idUsuario'];
        $data['estado']='1';

        $this->usuario_model->modificarUsuario($idUsuario,$data);
        redirect('usuario/deshabilitados','refresh');
	}

  public function deshabilitados()
  {
    $lista = $this->usuario_model->listadeshabilitados();
    $data['usuario'] = $lista;

    $this->load->view('inc_header');
    $this->load->view('inc_menu');
    $this->load->view('usuario/usuario_deshabilitados', $data);
    $this->load->view('inc_footer');
  }
 
}
