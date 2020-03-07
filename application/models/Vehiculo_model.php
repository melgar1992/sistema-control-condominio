<?php
class Vehiculo_model extends CI_Model
{
    public function buscarVehiculo($placa)
    {
        $this->db->where('placa', $placa);
        $this->db->from('vehiculo');
        return $this->db->get()->row_array();
        
    }
}