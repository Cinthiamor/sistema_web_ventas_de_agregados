<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DetalleVenta_model extends CI_Model {

    public $estado;
    public $fechaRegistro;
    public $fechaActualizacion;
        
    public function __construct(){
        $this->estado = true;
        $this->fechaRegistro = date("Y-m-d H:i:s");
        $this->fechaActualizacion = date("Y-m-d H:i:s");
    }

	public function lista()
	{
		$this->db->select('v.*');
        $this->db->from('venta v'); 
        return $this->db->get();
	}

    public function recuperarDetalleVenta($idVenta){
        $this->db->select('*');
        $this->db->from('venta'); 
        $this->db->where('idVenta', $idVenta);
        return $this->db->get();
	}

    public function crearDetalleVenta($data) {
        $this->db->insert('detalleventa', $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }
}
