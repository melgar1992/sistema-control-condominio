<?php
class Persona_model extends CI_Model
{
    public function buscarPersona($ci)
    {
        $this->db->where('carnet_identidad', $ci);
        $this->db->from('persona');
        return $this->db->get()->row_array();
    }
    public function buscarPersonaXNombre($nombre)
    {
        $this->db->select('p.nombres as label, p.apellidos, p.carnet_identidad, p.telefono');
        $this->db->from('persona p');
        $this->db->like('p.nombres', $nombre);
        return $this->db->get()->result_array();
    }
    public function buscarPersonaXCi($ci)
    {
        $this->db->select('p.nombres, p.apellidos, p.carnet_identidad as label, p.telefono');
        $this->db->from('persona p');
        $this->db->like('p.carnet_identidad', $ci);
        return $this->db->get()->result_array();
    }
}
