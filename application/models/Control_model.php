<?php
class Control_model extends CI_Model
{
    public function getControl_ingreso()
    {
        $this->db->select('ce.*,pc.nombres as nombre_copropietario, pc.apellidos as apellidos_copropietario, cv.nombre as nombre_visita, v.placa, v.color, v.marca, p.nombres, p.apellidos, p.carnet_identidad, p.telefono');
        $this->db->from('control_entrada_salida ce');
        $this->db->join('persona p', 'p.id_persona = ce.id_persona');
        $this->db->join('copropietario cp', 'cp.id_copropietario = ce.id_copropietario');
        $this->db->join('persona pc', 'pc.id_persona = cp.id_persona');
        $this->db->join('vehiculo v', 'v.id_vehiculo = ce.id_vehiculo');
        $this->db->join('categoria_visita cv', 'cv.id_categoria_visita = ce.id_categoria_visita');
        $resultado = $this->db->get();

        return $resultado->result();
    }
    public function guardarControl($datospersona, $datosvehiculo, $datoscontrol)
    {

        $resultadop = $this->Persona_model->buscarPersona($datospersona['carnet_identidad']);
        if (isset($resultadop)) {
            $datoscontrol['id_persona'] = $resultadop['id_persona'];
        } else {
            $this->db->insert('persona', $datospersona);

            $id_persona = $this->db->insert_id();

            $datoscontrol['id_persona'] = $id_persona;
        }
        $resultadov = $this->Vehiculo_model->buscarVehiculo($datosvehiculo['placa']);
        if (isset($resultadov)) {
            $datoscontrol['id_vehiculo'] = $resultadov['id_vehiculo'];
        } else {
            $this->db->insert('vehiculo', $datosvehiculo);

            $id_vehiculo = $this->db->insert_id();

            $datoscontrol['id_vehiculo'] = $id_vehiculo;
        }

        return $this->db->insert('control_entrada_salida', $datoscontrol);
    }
    public function editarControl($id_control_entrada_salida, $datospersona, $datosvehiculo, $datoscontrol)
    {
        $resultadop = $this->Persona_model->buscarPersona($datospersona['carnet_identidad']);
        if (isset($resultadop)) {
            if (($resultadop['nombres'] != $datospersona['nombres']) || ($resultadop['apellidos'] != $datospersona['apellidos'])) {
                $this->db->where('id_persona', $resultadop['id_persona']);
                $this->db->update('persona', $datospersona);
                $datoscontrol['id_persona'] = $resultadop['id_persona'];
            } else {
                $datoscontrol['id_persona'] = $resultadop['id_persona'];
            }
        } else {
            $this->db->insert('persona', $datospersona);

            $id_persona = $this->db->insert_id();

            $datoscontrol['id_persona'] = $id_persona;
        }

        $resultadov = $this->Vehiculo_model->buscarVehiculo($datosvehiculo['placa']);
        if (isset($resultadov)) {
            if (($resultadov['color'] != $datosvehiculo['color']) || ($resultadov['marca'] != $datosvehiculo['marca'])) {
                $this->db->where('id_vehiculo', $resultadov['id_vehiculo']);
                $this->db->update('vehiculo', $datosvehiculo);
                $datoscontrol['id_vehiculo'] = $resultadov['id_vehiculo'];
            } else {
                $datoscontrol['id_vehiculo'] = $resultadov['id_vehiculo'];
            }
        } else {
            $this->db->insert('vehiculo', $datosvehiculo);

            $id_vehiculo = $this->db->insert_id();

            $datoscontrol['id_vehiculo'] = $id_vehiculo;
        }
        $this->db->where('id_control_entrada_salida', $id_control_entrada_salida);
        return $this->db->update('control_entrada_salida', $datoscontrol);
    }
    public function ultimoID()
    {
        return $this->db->insert_id();
    }
}
