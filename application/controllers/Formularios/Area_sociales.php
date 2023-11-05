<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Area_sociales extends BaseController
{
    public function index()
    {
        $data = array(
            'area_sociales' => $this->Area_social_model->getAreaSociales(),
        );

        $this->loadView('Area_sociales', '/forms/formularios/areas_sociales/list', $data);
    }
    public function obtenerAreasSocialesAjax()
    {
        $areas_sociales = $this->Area_social_model->getAreaSociales();
        echo json_encode($areas_sociales);
    }
    public function guardarAreaSocial()
    {
        $nombres = $this->input->post('nombre');
        $this->form_validation->set_rules("nombre", "Nombre", "required");
        if ($this->form_validation->run()) {

            $datosAreaSocial = array(
                'nombre_area_social' => $nombres,
                'estado' => '1',
            );

            if ($this->Area_social_model->guardarAreaSocial($datosAreaSocial)) {
                redirect(base_url() . "Formularios/Area_sociales");
            } else {
                $this->session->set_flashdata("error", "No se pudo guardar la informacion");
            }
        } else {
            $this->index();
        }
    }
    public function actualizarAreaSocial()
    {
        $nombres = $this->input->post('nombre-editar');
        $id_area_sociales = $this->input->post('id_area_sociales');
        $this->form_validation->set_rules("nombre-editar", "nombre-editar", "required");
        if ($this->form_validation->run()) {

            $datosAreaSocial = array(
                'nombre_area_social' => $nombres,
            );

            if ($this->Area_social_model->actualizar($id_area_sociales, $datosAreaSocial)) {
                redirect(base_url() . "Formularios/Area_sociales");
            } else {
                $this->session->set_flashdata("error", "No se pudo actualizar la informacion");
                redirect(base_url() . "Formularios/Area_sociales");
            }
        } else {
            $this->index();
        }
    }
    public function borrar($id_area_social)
    {
        $data = array(
            'estado' => "0",
        );
        $this->Area_social_model->actualizar($id_area_social, $data);
        echo "Formularios/Area_sociales";
    }
    public function formularioReservacionAreaSocial()
    {
        $data = array(
            'reserva_area_social' => $this->Area_social_model->getReservacionAreasSociales(),
        );

        $this->loadView('Reservacion_area_social', '/forms/formularios/reservacion_area_social/list', $data);
    }
    public function obtenerReservacionesAreaSociales()
    {
        $reservaciones = $this->Area_social_model->getReservacionAreasSociales();
        echo json_encode($reservaciones);
    }
    public function buscarAreaSocialAjax()
    {
        $nombre = $this->input->post('valor');
        $areas_sociales = $this->Area_social_model->buscarAreaSocialXNombre($nombre);
        echo json_encode($areas_sociales);
    }
    public function guardarReservaAreaSocial()
    {
        $id_area_sociales = $this->input->post('id_area_sociales');
        $id_copropietario = $this->input->post('id_copropietario');
        $invitados = $this->input->post('invitados');
        $fecha_ini = $this->input->post('fecha_ini');


        $this->form_validation->set_rules("ci", "ci", "required");
        $this->form_validation->set_rules("nombre_area_social", "nombre_area_social", "required");
        $this->form_validation->set_rules("invitados", "invitados", "required");
        $this->form_validation->set_rules("fecha_ini", "fecha_ini", "required");

        if ($this->form_validation->run()) {

            $datosAreaSocial = array(
                'id_area_sociales' => $id_area_sociales,
                'id_copropietario' => $id_copropietario,
                'invitados' => $invitados,
                'fecha_ini' => $fecha_ini,
                'estado' => '1',
            );

            if ($this->Area_social_model->guardarReservacionAreaSociales($datosAreaSocial)) {
                redirect(base_url() . "Formularios/Area_sociales/formularioReservacionAreaSocial");
            } else {
                $this->session->set_flashdata("error", "No se pudo guardar la informacion");
            }
        } else {
            $this->formularioReservacionAreaSocial();
        }
    }
    public function actualizarReservaAreaSocial()
    {
        $invitados = $this->input->post('invitados-editar');
        $fecha_ini = $this->input->post('fecha_ini-editar');
        $id_reserva_area_social = $this->input->post('id_reserva_area_social-editar');
        $id_area_sociales = $this->input->post('id_area_sociales-editar');
        $id_copropietario = $this->input->post('id_copropietario-editar');

        $this->form_validation->set_rules("nombre-editar", "nombre-editar", "required");
        if ($this->form_validation->run()) {

            $datosAreaSocial = array(
                'id_area_sociales' => $id_area_sociales,
                'id_copropietario' => $id_copropietario,
                'invitados' => $invitados,
                'fecha_ini' => $fecha_ini,
            );

            if ($this->Area_social_model->actualizarReservacionAreaSociales($id_reserva_area_social, $datosAreaSocial)) {
                redirect(base_url() . "Formularios/Area_sociales/formularioReservacionAreaSocial");
            } else {
                $this->session->set_flashdata("error", "No se pudo actualizar la informacion");
                redirect(base_url() . "Formularios/Area_sociales/formularioReservacionAreaSocial");
            }
        } else {
            $this->formularioReservacionAreaSocial();
        }
    }
    public function borrarReserva($id_reserva_area_social)
    {
        $data = array(
            'estado' => "0",
        );
        $this->Area_social_model->actualizarReservacionAreaSociales($id_reserva_area_social, $data);
        echo "Formularios/Area_sociales/formularioReservacionAreaSocial";
    }
}
