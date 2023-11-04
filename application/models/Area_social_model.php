<?php
class Area_social_model extends CI_Model
{
    public function getAreaSociales()
    {
        $this->db->select('*');
        $this->db->from('area_sociales');
        $this->db->where('estado', '1');
        return $this->db->get()->result_array();
    }

    public function guardarAreaSocial($datos)
    {
        return $this->db->insert('area_sociales', $datos);
    }

    public function actualizar($id_area_sociales, $datos)
    {
        $this->db->where('id_area_sociales', $id_area_sociales);
        return $this->db->update('area_sociales', $datos);
    }
}
