<?php
class Categoria_visita_model extends CI_Model
{

    public function getCategorias()
    {
        $this->db->select('*');
        $this->db->where('estado', '1');
        $resultado = $this->db->get('categoria_visita')->result();
        return $resultado;
    }
    public function guardarCategoria($datos)
    {
        return $this->db->insert('categoria_visita', $datos);
    }
    public function getCategoria($id_cateogoria_visita)
    {
        $this->db->select('*');
        $this->db->where('estado', '1');
        $this->db->where('id_categoria_visita', $id_cateogoria_visita);
        $resultado = $this->db->get('categoria_visita')->row();
        return $resultado;
    }
    public function actualizarCategoria($id_cateogoria_visita, $datos)
    {
        $this->db->where('id_categoria_visita',$id_cateogoria_visita);
        return $this->db->update('categoria_visita',$datos);
    }
}
