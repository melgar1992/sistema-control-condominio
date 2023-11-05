<?php
class Area_social_model extends CI_Model
{
    public function getAreaSociales()
    {
        $this->db->select('*');
        $this->db->from('area_sociales');
        $this->db->where('estado', '1');
        $this->db->limit('100');
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
    public function getReservacionAreasSociales()
    {
        $this->db->select('r.id_reserva_area_social, r.id_area_sociales, r.id_copropietario,a.nombre_area_social ,r.invitados, r.fecha_ini, concat(p.nombres, " ", p.apellidos) as nombre_apellidos, p.nombres, p.apellidos, p.carnet_identidad, c.numero_vivienda');
        $this->db->from('reserva_area_social r');
        $this->db->join('copropietario c', 'c.id_copropietario = r.id_copropietario');
        $this->db->join('persona p', 'c.id_persona = p.id_persona');
        $this->db->join('area_sociales a', 'a.id_area_sociales = r.id_area_sociales');
        $this->db->where('r.estado', '1');
        $this->db->limit('100');
        return $this->db->get()->result_array();
    }
    public function guardarReservacionAreaSociales($datos)
    {
        return $this->db->insert('reserva_area_social', $datos);
    }
    public function actualizarReservacionAreaSociales($id_reserva_area_social, $datos)
    {
        $this->db->where('id_reserva_area_social', $id_reserva_area_social);
        return $this->db->update('reserva_area_social', $datos);
    }
    public function buscarAreaSocialXNombre($nombre)
    {
        $this->db->select('a.id_area_sociales, a.nombre_area_social as label');
        $this->db->from('area_sociales a');
        $this->db->where('estado', '1');
        $this->db->like('nombre_area_social', $nombre);

        return $this->db->get()->result_array();
    }
}
