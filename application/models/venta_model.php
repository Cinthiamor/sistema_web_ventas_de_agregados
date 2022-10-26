<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Venta_model extends CI_Model {

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
		$this->db->select('v.*, u.login,CONCAT(c.nombres," ",IFNULL(c.primerApellido,"")," ",IFNULL(c.segundoApellido,"")) As nombres,c.nit_carnet,GROUP_CONCAT(p.nombre SEPARATOR  "<br>") as nombre, GROUP_CONCAT(p.precio SEPARATOR  "<br>") as precio, GROUP_CONCAT(d.cantidad SEPARATOR  "<br>") as cantidad');
        $this->db->from('venta v'); 
        $this->db->join("usuario u","v.idUsuario = u.idUsuario");        
        $this->db->join("cliente c","v.idCliente = c.idCliente"); 
        $this->db->join("detalleventa d","v.idVenta = d.idVenta"); 
        $this->db->join("producto p","p.idProducto = d.idProducto"); 
        $this->db->where('v.estado', 1);      
        $this->db->group_by('v.idVenta');
        return $this->db->get();
	}

    public function recuperarVenta($idVenta){
        $this->db->select('*');
        $this->db->from('venta'); 
        $this->db->where('idVenta', $idVenta);
        return $this->db->get();
	}

    public function crearVenta($data) {

        $this->db->insert('venta', $data); 
        $insert_id = $this->db->insert_id();
        return  $insert_id;
        
    }

    public function modificarVenta($idVenta, $data)
    {
        $data['fechaActualizacion'] = $this->fechaActualizacion;
        $this->db->where('idVenta', $idVenta);
        $this->db->update('venta', $data); 
    }

    public function eliminarVenta($idVenta, $estado)
    {
        $data['estado'] = !$this->estado;
        $data['fechaActualizacion'] = $this->fechaActualizacion;
        $this->db->where('idVenta', $idVenta);
        $this->db->update('venta', $data);
    }

    public function eliminarDetalleVenta($idVenta, $estado)
    {
        $data['estado'] = 0;
        $this->db->where('idVenta', $idVenta);
        $this->db->update('detalleventa', $data);
    }

    public function listadeshabilitados()
	{
        $this->db->select('v.*, u.login,c.nombres,c.nit_carnet,GROUP_CONCAT(p.nombre) as nombre, GROUP_CONCAT(p.precio) as precio, GROUP_CONCAT(d.cantidad) as cantidad');
        $this->db->from('venta v'); 
        $this->db->join("usuario u","v.idUsuario = u.idUsuario");        
        $this->db->join("cliente c","v.idCliente = c.idCliente"); 
        $this->db->join("detalleventa d","v.idVenta = d.idVenta"); 
        $this->db->join("producto p","p.idProducto = d.idProducto"); 
        $this->db->where('v.estado', 0);      
        $this->db->group_by('v.idVenta');
        return $this->db->get();

	}

    function precioVenta($idProducto)
    {
        $this->db->select('idProducto, precio');
        $this->db->FROM('producto');
        $this->db->WHERE('idProducto', $idProducto);
        //$this->db->limit(1);
        $resultado = $this->db->get();

        if ($resultado->num_rows() > 0) {
            $r = $resultado->row();
            return $r->precio;
        }else{
            return 0;
        }
    }

    function contarVentas()
    {
        $this->db->select('idVenta');
        $this->db->FROM('venta');
        $resultado = $this->db->get();

        if ($resultado->num_rows() > 0) {
            $r = $resultado->row();
            return 1000 + $resultado->num_rows();
        }else{
            return 1000;
        }
    }

    function getNotaDeVenta($idVenta)
    {
        return $this->db->get_where('venta',array('idVenta'=>$idVenta))->row_array();
    }

    function getVentas($idVenta)
    {
        return $this->db->get_where('venta',array('idVenta'=>$idVenta))->row_array();
    }

    function getDetalleVentas($idVenta)
    {
        $this->db->select('di.idVenta, di.idProducto,di.cantidad,di.precioUnitario, p.nombre, p.descripcion');
        $this->db->from('detalleventa di');
        $this->db->join('Producto p','p.idProducto = di.idProducto');
        $this->db->Where('di.idVenta',$idVenta);
        return $this->db->get()->result_array();
    }

    function addDetalleVentas($datosDetalleVenta)
    {
        $this->db->insert('detalleventa',$datosDetalleVenta);
        return $this->db->insert_id();
    }

    function getAllVentas()
    {
        $this->db->order_by('idVenta', 'desc');
        //$this->db->where('estado', 1);
        return $this->db->get('venta')->result_array();
    }

    function obtenerTodasVentasPorFecha($startDate, $endDate) {
        $this->db->select('v.idVenta, v.nroComprobante, v.fecha, v.total, CONCAT(c.nombres, " ", c.primerApellido, " ", c.segundoApellido) AS nombreCliente, CONCAT(u.nombres," ",u.primerApellido," ",u.segundoApellido) AS nombreUsuario');
        $this->db->from('venta v');
        $this->db->join('cliente c','c.idCliente = v.idCliente');
        $this->db->join('usuario u', 'u.idUsuario = v.idUsuario');
        if ($startDate != null && $endDate != null) {
            $this->db->where('DATE(fecha) >=', date('Y-m-d',strtotime($startDate)));
            $this->db->where('DATE(fecha) <=', date('Y-m-d',strtotime($endDate)));
        }
        return $this->db->get()->result_array();
    }
}
