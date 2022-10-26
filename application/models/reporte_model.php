<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reporte_model extends CI_Model {

    function obtenerTodasVentasPorFecha($startDate, $endDate) {
        $this->db->select('v.idVenta, v.nroComprobante, v.fecha, v.total, CONCAT(c.nombres, " ", c.primerApellido, " ", c.segundoApellido) AS nombreCliente, CONCAT(u.nombres," ",u.primerApellido," ",u.segundoApellido) AS nombreUsuario');
        $this->db->from('venta v');
        $this->db->join('cliente c','c.idCliente = v.idCliente');
        if ($startDate != null && $endDate != null) {
            $this->db->where('DATE(fecha) >=', date('Y-m-d',strtotime($startDate)));
            $this->db->where('DATE(fecha) <=', date('Y-m-d',strtotime($endDate)));
        }
        return $this->db->get()->result_array();
    }
}
