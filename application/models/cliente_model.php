<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente_model extends CI_Model {

    public $estado;
    public $fechaCreacion;
    public $fechaActualizacion;

    public function __construct(){
        $this->estado = true;
        $this->fechaCreacion = date("Y-m-d H:i:s");
        $this->fechaActualizacion = date("Y-m-d H:i:s");
    }

    public function lista()
	{
		$this->db->select('*');
        $this->db->from('cliente'); 
        $this->db->where('estado', 1);       
        return $this->db->get();
	}

    public function recuperarCliente($idCliente){
        $this->db->select('*');
        $this->db->from('cliente'); 
        $this->db->where('idCliente', $idCliente);
        return $this->db->get();
	}

    public function crearCliente($data) {
        $data['fechaCreacion'] =  $this->fechaCreacion;
        $data['estado'] = $this->estado;
        $this->db->insert('cliente', $data); 
    }
    public function modificarCliente($idCliente, $data)
    {
        $data['fechaActualizacion'] = $this->fechaActualizacion;
        $this->db->where('idCliente', $idCliente);
        $this->db->update('cliente', $data); 
    }

    public function eliminarCliente($idCliente)
    {
        $data['estado'] = !$this->estado;
        $data['fechaActualizacion'] = $this->fechaActualizacion;
        $this->db->where('idCliente', $idCliente);
        $this->db->update('cliente', $data);
    }

    public function listadeshabilitados()
	{
		$this->db->select('*');
        $this->db->from('cliente'); 
        $this->db->where('estado', 0);
       
        return $this->db->get();
	}
}
