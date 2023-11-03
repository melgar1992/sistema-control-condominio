<?php
class Copropietario_model extends CI_Model
{
    public function getCopropietarios()
    {
        $this->db->select('c.*, p.nombres, p.apellidos, p.carnet_identidad, p.telefono');
        $this->db->from('copropietario c');
        $this->db->join('persona p', 'c.id_persona = p.id_persona');
        $this->db->where('c.estado', '1');
        $resultado = $this->db->get();

        return $resultado->result();
    }
    public function guardarCopropietario($datospersona, $datoscopropietarios)
    {
        $this->db->insert('persona', $datospersona);

        $id_persona = $this->db->insert_id();

        $datoscopropietarios['id_persona'] = $id_persona;

        return $this->db->insert('copropietario', $datoscopropietarios);
    }
    public function validarCi($ci)
    {
        $this->db->select('c.estado, p.carnet_identidad');
        $this->db->from('copropietario c');
        $this->db->join('persona p', 'c.id_persona = p.id_persona');
        $this->db->where('p.carnet_identidad', $ci);
        $this->db->where('c.estado', '1');

        $resultado = $this->db->get();

        $row = $resultado->row();

        if (isset($row)) {
            return false;
        } else {
            return true;
        }
    }
    public function getCopropietario($id_copropietario)
    {
        $this->db->select('c.*, p.nombres, p.apellidos, p.carnet_identidad, p.telefono');
        $this->db->from('copropietario c');
        $this->db->join('persona p', 'c.id_persona = p.id_persona');
        $this->db->where('c.estado', '1');
        $this->db->where('id_copropietario', $id_copropietario);
        $resultado = $this->db->get();

        return $resultado->row();
    }
    public function actualizar($id_copropietario, $id_persona, $datospersona, $datoscopropietarios)
    {
        $this->db->where('id_persona', $id_persona);
        $this->db->update('persona', $datospersona);

        $this->db->where('id_copropietario', $id_copropietario);
        return $this->db->update('copropietario', $datoscopropietarios);
    }

    public function borrar($id_copropietario, $data)
    {
        $this->db->where("id_copropietario", $id_copropietario);
        return $this->db->update("copropietario", $data);
    }
    public function buscarCopropietariosXNombre($nombre)
    {
        $this->db->select('p.nombres as label, p.apellidos, p.carnet_identidad, p.telefono, c.*');
        $this->db->from('copropietario c');
        $this->db->join('persona p', 'c.id_persona = p.id_persona');
        $this->db->where('c.estado', '1');
        $this->db->like('p.nombres', $nombre);

        return $this->db->get()->result_array();
    }
    public function buscarCopropietariosXCi($ci)
    {
        $this->db->select('p.nombres, p.apellidos, p.carnet_identidad as label, p.telefono, c.*');
        $this->db->from('copropietario c');
        $this->db->join('persona p', 'c.id_persona = p.id_persona');
        $this->db->where('c.estado', '1');
        $this->db->like('p.carnet_identidad', $ci);

        return $this->db->get()->result_array();
    }
    //Funciones de movilidades de propietarios

    public function getMovilidades_propietarios()
    {
        $this->db->select('c.id_copropietario, p.nombres, p.apellidos, p.telefono, c.numero_vivienda, c.calle , v.placa, v.marca, v.color');
        $this->db->from('copropietario c');
        $this->db->join('persona p', 'c.id_persona = p.id_persona');
        $this->db->join('vehiculo v', 'c.id_copropietario = v.id_copropietario');
        $this->db->where('c.estado', '1');
        return $this->db->get()->result_array();
    }

    public function guardarMovilidadPropietario($datosMovilidad)
    {
        return $this->db->insert('vehiculo', $datosMovilidad);
    }
}
