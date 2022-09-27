<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

    public $estado;
    public $fechaCreacion;
    public $fechaActualizacion;
    
    public function validar($login,$password)
	{
        $this->db->select('*'); //select
        $this->db->from('usuario'); //tabla
		$this->db->where('login',$login);
        $this->db->where('password',$password);
        return $this->db->get(); //devolucion del resultado de la consulta
	}

    public function __construct(){
        $this->estado = true;
        $this->fechaCreacion = date("Y-m-d H:i:s");
        $this->fechaActualizacion = date("Y-m-d H:i:s");
    }

	public function lista()
	{
		$this->db->select('*');
        $this->db->from('usuario'); 
        $this->db->where('estado', 1);       
        return $this->db->get();
	}

    public function recuperarUsuario($idUsuario){
        $this->db->select('*');
        $this->db->from('usuario'); 
        $this->db->where('idUsuario', $idUsuario);
        return $this->db->get();
	}

    public function crearUsuario($data) {
        $data['fechaCreacion'] =  $this->fechaCreacion;
        $data['estado'] = $this->estado;
        $this->db->insert('usuario', $data); 
    }

    public function modificarUsuario($idUsuario, $data)
    {
        $data['fechaActualizacion'] = $this->fechaActualizacion;
        $this->db->where('idUsuario', $idUsuario);
        $this->db->update('usuario', $data); 
    }

    public function eliminarUsuario($idUsuario)
    {
        $data['estado'] = !$this->estado;
        $data['fechaActualizacion'] = $this->fechaActualizacion;
        $this->db->where('idUsuario', $idUsuario);
        $this->db->update('usuario', $data);
    }
    public function listadeshabilitados()
	{
		$this->db->select('*');
        $this->db->from('usuario'); 
        $this->db->where('estado', 0);
       
        return $this->db->get();
	}
}
