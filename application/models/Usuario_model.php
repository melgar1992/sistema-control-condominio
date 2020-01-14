<?php
class Usuario_model extends CI_Model
{

    public function login($username, $password)
    {
        $this->db->select('usuarios.*, roles.nombre as rol');
        $this->db->where("username", $username);
        $this->db->where("password", $password);
        $this->db->where("estado", "1");
        $this->db->join('roles', 'roles.id_roles = usuarios.id_roles');


        $resultado = $this->db->get("usuarios");

        if ($resultado->num_rows() > 0) {
            return  $resultado->row();
        } else {
            return false;
        }
    }
}