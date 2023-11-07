<?php
class Area_copropietarios_model extends CI_Model
{
    public function getControlAreaCopropietarios()
    {
        $this->db->select('ca.*, concat(p.nombres, " " , p.apellidos) as nombre_apellidos, a.nombre_area_social, c.numero_vivienda, c.calle, c.numero_interno, c.tipo_copropietario, p.nombres, p.apellidos, p.carnet_identidad, p.telefono');
        $this->db->from('control_area_copropietario ca');
        $this->db->join('copropietario c', 'c.id_copropietario = ca.id_copropietario');
        $this->db->join('persona p', 'p.id_persona = c.id_persona');
        $this->db->join('area_sociales a', 'a.id_area_sociales = ca.id_area_sociales');
        $this->db->where('ca.estado', '1');
        return $this->db->get()->result_array();
    }
    public function guardarControlAreaCopropietarios($datos)
    {
        return $this->db->insert('control_area_copropietario', $datos);
    }
    public function getControlAreaCopropietarioxID($id_control_area_copropietario)
    {
        $this->db->select('ca.*, concat(p.nombres, " " , p.apellidos) as nombre_apellidos, a.nombre_area_social, c.numero_vivienda, c.calle, c.numero_interno, c.tipo_copropietario, p.nombres, p.apellidos, p.carnet_identidad, p.telefono');
        $this->db->from('control_area_copropietario ca');
        $this->db->join('copropietario c', 'c.id_copropietario = ca.id_copropietario');
        $this->db->join('persona p', 'p.id_persona = c.id_persona');
        $this->db->join('area_sociales a', 'a.id_area_sociales = ca.id_area_sociales');
        $this->db->where('ca.id_control_area_copropietario', $id_control_area_copropietario);
        return $this->db->get()->row_array();
    }
    public function actualizarControlAreaCopropietarios($id_control_area_copropietario, $datos)
    {
        $this->db->where('id_control_area_copropietario', $id_control_area_copropietario);
        return $this->db->update('control_area_copropietario', $datos);
    }
}
