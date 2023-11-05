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
    public function buscarAreaSocialAjax()
    {
        $nombre = $this->input->post('valor');
        $areas_sociales = $this->Area_social_model->buscarAreaSocialXNombre($nombre);
        echo json_encode($areas_sociales);
    }
}
