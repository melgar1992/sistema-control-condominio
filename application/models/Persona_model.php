<?php
class Persona_model extends CI_Model
{
    public function buscarPersona($ci)
    {
        $this->db->where('carnet_identidad', $ci);
        $this->db->from('persona');
        return $this->db->get()->row_array();
        
    }
}