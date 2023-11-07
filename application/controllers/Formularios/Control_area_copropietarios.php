<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Control_area_copropietarios extends BaseController
{
    public function index()
    {
        $datos = array();

        $this->loadView('ControlAreaPropietarios', '/forms/formularios/areas_sociales/area_copropietarios', $datos);
    }
    public function obtenerControlAreasPropietariosAjax()
    {
        $Control = $this->Area_copropietarios_model->getControlAreaCopropietarios();
        echo json_encode($Control);
    }
    public function guardarControlArea()
    {
        $id_copropietario = $this->input->post('id_copropietario');
        $id_area_sociales = $this->input->post('id_area_sociales');
        $fecha_ini = date('Y-m-d H:i:s');
        $this->form_validation->set_rules("id_copropietario", "id_copropietario", "required");
        $this->form_validation->set_rules("id_area_sociales", "id_area_sociales", "required");

        $datosControlArea = array(
            'id_copropietario' => $id_copropietario,
            'id_area_sociales' => $id_area_sociales,
            'fecha_ini' => $fecha_ini,
            'estado' => '1'
        );
        if ($this->form_validation->run()) {
            if ($this->Area_copropietarios_model->guardarControlAreaCopropietarios($datosControlArea)) {
                $id_control_area_copropietario = $this->Control_model->ultimoID();
                $dControl_area = $this->Area_copropietarios_model->getControlAreaCopropietarioxID($id_control_area_copropietario);
                $respuesta = array(
                    'respuesta' => 'Exitoso',
                    'datos' => array(
                        'id_control_area_copropietario' => $id_control_area_copropietario,
                        'nombre_apellidos' => $dControl_area['nombre_apellidos'],
                        'carnet_identidad' => $dControl_area['carnet_identidad'],
                        'numero_vivienda' => $dControl_area['numero_vivienda'],
                        'nombre_area_social' => $dControl_area['nombre_area_social'],
                        'fecha_ini' => $dControl_area['fecha_ini'],
                        'fecha_fin' => $dControl_area['fecha_fin'],
                        'id_area_sociales' => $dControl_area['id_area_sociales'],
                        'id_copropietario' => $dControl_area['id_copropietario'],

                    )
                );
            } else {
                $respuesta = array('respuesta' => 'No se pudo guardar correctamente');
            }
        } else {
            $respuesta = array('respuesta' => 'No se llenaron los campos correctamente');
        }
        echo json_encode($respuesta);
    }
    public function actualizarControlArea()
    {
        $id_control_area_copropietario = $this->input->post('id_control_area_copropietario');
        $id_copropietario = $this->input->post('id_copropietario');
        $id_area_sociales = $this->input->post('id_area_sociales');
        $datosControlArea = array(
            'id_copropietario' => $id_copropietario,
            'id_area_sociales' => $id_area_sociales,
        );
        if ($this->Area_copropietarios_model->actualizarControlAreaCopropietarios($id_control_area_copropietario, $datosControlArea)) {
            $dControl_area = $this->Area_copropietarios_model->getControlAreaCopropietarioxID($id_control_area_copropietario);
            $respuesta = array(
                'respuesta' => 'Exitoso',
                'datos' => array(
                    'id_control_area_copropietario' => $id_control_area_copropietario,
                    'nombre_apellidos' => $dControl_area['nombre_apellidos'],
                    'carnet_identidad' => $dControl_area['carnet_identidad'],
                    'numero_vivienda' => $dControl_area['numero_vivienda'],
                    'nombre_area_social' => $dControl_area['nombre_area_social'],
                    'fecha_ini' => $dControl_area['fecha_ini'],
                    'fecha_fin' => $dControl_area['fecha_fin'],
                    'id_area_sociales' => $dControl_area['id_area_sociales'],
                    'id_copropietario' => $dControl_area['id_copropietario'],

                )
            );
        } else {
            $respuesta = array('respuesta' => 'No se pudo guardar correctamente');
        }

        echo json_encode($respuesta);
    }

    public function borrarControl($id_control_entrada_salida)
    {
        $datosControlArea = array(
            'estado' => '0',
        );
        $this->Area_copropietarios_model->actualizarControlAreaCopropietarios($id_control_entrada_salida, $datosControlArea);
        $respuesta = array(
            'respuesta' => 'Exitoso',
        );

        echo json_encode($respuesta);
    }
    public function marcarSalida()
    {
        $id_control_entrada_salida = $this->input->post('id');
        $fecha_fin = date('Y-m-d H:i:s');
        $datoscontrol = array(
            'fecha_fin' => $fecha_fin,
        );

        if ($this->Area_copropietarios_model->actualizarControlAreaCopropietarios($id_control_entrada_salida, $datoscontrol)) {
            $respuesta = array(
                'respuesta' => 'Exitoso',
                'datos' => array(
                    'fecha_fin' => $fecha_fin,
                )
            );
        } else {
            $respuesta = array('respuesta' => 'No se pudo guardar correctamente');
        }
        echo json_encode($respuesta);
    }
}
