<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

    public $estado;
    public $fechaRegistro;
    public $fechaActualizacion;

    public function __construct(){
        $this->estado = true;
        $this->fechaRegistro = date("Y-m-d H:i:s");
        $this->fechaActualizacion = date("Y-m-d H:i:s");
    }
    
    public function validar($login,$password)
	{
        $this->db->select('u.*, t.tipoUsuario');//select
        $this->db->from('usuario u'); //tabla
        $this->db->join("tipousuario t","u.idTipoUsuario = t.idTipoUsuario");
		$this->db->where('login',$login);
        $this->db->where('password',$password);
        return $this->db->get(); //devolucion del resultado de la consulta
	}
    
	public function lista()
	{
		$this->db->select('u.*, t.tipoUsuario');
        $this->db->from('usuario u'); 
        $this->db->join("tipousuario t","u.idTipoUsuario = t.idTipoUsuario");
        $this->db->where('u.habilitado', 1);       
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
        $data['fechaRegistro'] =  $this->fechaRegistro;
        $data['estado'] = $this->estado;
        $this->db->insert('usuario', $data); 
        
    }

    public function modificarUsuario($idUsuario, $data)
    {
        $data['fechaActualizacion'] = $this->fechaActualizacion;
        $this->db->where('idUsuario', $idUsuario);
        $this->db->update('usuario', $data); 
    }

    public function eliminarUsuario($idUsuario, $estado)
    {
        $data['estado'] = !$this->estado;
        $data['fechaActualizacion'] = $this->fechaActualizacion;
        $this->db->where('idUsuario', $idUsuario);
        $this->db->update('usuario', $data);
    }
    public function listadeshabilitados()
	{
		$this->db->select('u.*, t.tipoUsuario');
        $this->db->from('usuario u'); 
        $this->db->join("tipousuario t","u.idTipoUsuario = t.idTipoUsuario");
        $this->db->where('habilitado', 0);
        $this->db->where('estado', 1);
       
        return $this->db->get();
	}
}
