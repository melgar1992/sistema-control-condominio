<?php
class Libro_guardia_model extends CI_Model
{
    public function getLibrosdeGuardia($rol, $id_usuarios)
    {
        if ($rol == 'guardia') {
            $this->db->select('l.id_libro_guardia, l.id_usuarios, l.acta,concat(u.nombres, " ", u.apellidos) as nombre_apellidos, u.nombres, u.apellidos, u.carnet_identidad, l.fecha');
            $this->db->from('libro_guardia l');
            $this->db->join('usuarios u', 'u.id_usuarios = l.id_usuarios');
            $this->db->where('l.id_usuarios', $id_usuarios);
            $this->db->limit('100');
            return $this->db->get()->result_array();
        } else {
            $this->db->select('l.id_libro_guardia, l.id_usuarios, l.acta,concat(u.nombres, " ", u.apellidos) as nombre_apellidos, u.nombres, u.apellidos, u.carnet_identidad, l.fecha');
            $this->db->from('libro_guardia l');
            $this->db->join('usuarios u', 'u.id_usuarios = l.id_usuarios');
            $this->db->limit('100');
            return $this->db->get()->result_array();
        }
    }
    public function actualizarLibroGuardia($rol, $id_libro_guardia, $datos)
    {
        if ($rol == 'guardia') {
            $this->db->where('id_libro_guardia', $id_libro_guardia);
            return $this->db->update('libro_guardia', $datos);
        } else {
            return false;
        }
    }
    public function guardarLibroGuardia($rol, $datos)
    {
        if ($rol == 'guardia') {
            return $this->db->insert('libro_guardia', $datos);
        } else {
            return false;
        }
    }
    public function borrar($id_libro_guardia)
    {
        $this->db->where('id_libro_guardia', $id_libro_guardia);
        $this->db->delete('libro_guardia');
    }
}
