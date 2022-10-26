<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuario extends CI_Controller
{
  public $exist;
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $exist=false;
    $data['msg']=$this->uri->segment(3);
    
		if($this->session->userdata('login'))
		{
			redirect('usuario/panel',$exist,'refresh');
		}
		else
		{
			$this->load->view('inc_header');
      //$this->load->view('inc_menu');
      $this->load->view('usuario/usuario_login', $data);
      //$this->load->view('inc_footer');
		} 
  }
  public function listaUsuario()
	{
    $data1['logout']=$this->uri->segment(3);

    $lista = $this->usuario_model->lista();
    $data['usuario'] = $lista;

		$this->load->view('inc_header');
    $this->load->view('inc_menu',$data1);
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
					'idusuario'   => $row->idUsuario,
          'nombres'     => $row->nombres,
					'login'       => $row->login,
					'tipo'        => $row->tipoUsuario
				);
        $exist=true;
				//$this->session->set_userdata($newdata);
				$this->session->set_userdata('idusuario', $row->idUsuario);
				$this->session->set_userdata('nombres', $row->nombres);
				$this->session->set_userdata('login', $row->login);
				$this->session->set_userdata('tipo', $row->tipoUsuario);				
				redirect('usuario/panel',$exist,'refresh');

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
				redirect('usuario/listaUsuario/1','refresh');
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
    $exist=false;
		redirect('usuario/index/1',$exist,'refresh');
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
    $data['nombres'] = $_POST['nombres'];
    $data['primerApellido'] = $_POST['primerApellido'];
    $data['segundoApellido'] = $_POST['segundoApellido'];
    $data['fechaNacimiento'] = $_POST['fechaNacimiento'];
    $data['ci'] = $_POST['ci'];
    $data['login'] = $_POST['login'];
    $data['password'] = MD5($_POST['password']);
    $data['genero'] = $_POST['genero'];
    $data['celular'] = $_POST['celular'];
    $data['direccion'] = $_POST['direccion'];
    $data['correo'] = $_POST['correo'];
    //$data['img'] = $_POST['img'];
    $data['idTipoUsuario'] = $_POST['idTipoUsuario'];

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
    $data['nombres'] = $_POST['nombres'];
    $data['primerApellido'] = $_POST['primerApellido'];
    $data['segundoApellido'] = $_POST['segundoApellido'];
    $data['fechaNacimiento'] = $_POST['fechaNacimiento'];
    $data['ci'] = $_POST['ci'];
    $data['login'] = $_POST['login'];
    $data['password'] = MD5($_POST['password']);
    $data['celular'] = $_POST['celular'];
    $data['direccion'] = $_POST['direccion'];
    $data['correo'] = $_POST['correo'];
    //$data['img'] = $_POST['img'];
    $data['idTipoUsuario'] = $_POST['idTipoUsuario'];

    $this->usuario_model->modificarUsuario($idUsuario, $data);
    redirect('usuario/index', 'refresh');
  }

  public function eliminarUsuarioBd($idUsuario, $estado)
  { 
    /* $idUsuario = $_POST['idUsuario']; */
    $this->usuario_model->eliminarUsuario($idUsuario, $estado);
    redirect('usuario/index', 'refresh');
  }
  public function deshabilitarUsuarioBd($idUsuario)
	{		
    /* $idUsuario=$_POST['idUsuario']; */
    $data['habilitado']='0';

    $this->usuario_model->modificarUsuario($idUsuario,$data);
    redirect('usuario/index','refresh');
	}
  public function habilitarUsuarioBd($idUsuario)
	{		
    /* $idUsuario=$_POST['idUsuario']; */
    $data['habilitado']='1';

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
