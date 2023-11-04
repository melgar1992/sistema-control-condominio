<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Movilidades_propietarios extends BaseController
{
    public function index()
    {
        $data = array(
            'movildiades_propietarios' => $this->Copropietario_model->getMovilidades_propietarios(),
        );

        $this->loadView('Movilidades_propietarios', '/forms/formularios/movilidades_propietarios/list', $data);
    }
    public function obtenerMovilidadesAjax()
    {
        $vehiculos = $this->Copropietario_model->getMovilidades_propietarios();
        echo json_encode($vehiculos);
    }
    public function guardarMovilidadPropietario()
    {
        $id_copropietario = $this->input->post('id_copropietario');
        $placa = $this->input->post('placa');
        $color = $this->input->post('color');
        $marca = $this->input->post('marca');

        $this->form_validation->set_rules("placa", "placa", "required");
        $this->form_validation->set_rules("ci", "ci", "required");

        if ($this->form_validation->run()) {


            $datosMovilidad = array(
                'id_copropietario' => $id_copropietario,
                'placa' => $placa,
                'color' => $color,
                'marca' => $marca,
                'estado' => '1',
            );
            if ($this->Copropietario_model->guardarMovilidadPropietario($datosMovilidad)) {
                redirect(base_url() . "Formularios/Movilidades_propietarios");
            } else {
                $this->session->set_flashdata("error", "No se pudo guardar la informacion");
            }
        } else {
            $this->index();
        }
    }
    public function editarMovilidadPropietario()
    {
        $id_copropietario = $this->input->post('id_copropietario-editar');
        $id_vehiculo = $this->input->post('id_vehiculo-editar');
        $placa = $this->input->post('placa-editar');
        $color = $this->input->post('color-editar');
        $marca = $this->input->post('marca-editar');

        $this->form_validation->set_rules("placa-editar", "placa", "required");
        $this->form_validation->set_rules("ci-editar", "ci", "required");

        if ($this->form_validation->run()) {


            $datosMovilidad = array(
                'id_copropietario' => $id_copropietario,
                'placa' => $placa,
                'color' => $color,
                'marca' => $marca,
            );
            if ($this->Copropietario_model->actualizarMovilidadPropietario($id_vehiculo, $datosMovilidad)) {
                redirect(base_url() . "Formularios/Movilidades_propietarios");
            } else {
                $this->session->set_flashdata("error", "No se pudo guardar la informacion");
            }
        } else {
            $this->index();
        }
    }
    public function eliminarMovilidadPropietario($id_vehiculo)
    {
        $datosMovilidad = array(
            'estado' => '0'
        );
        $this->Copropietario_model->actualizarMovilidadPropietario($id_vehiculo, $datosMovilidad);
        echo 'formularios/movilidades_propietarios';
    }
}
