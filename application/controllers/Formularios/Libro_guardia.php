<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Libro_guardia extends BaseController
{
    public function index()
    {
        $data = array();
        $this->loadView('Libro_guardia', '/forms/formularios/Libro_guardia/list', $data);
    }
    public  function guardarActa()
    {
        $acta = $this->input->post('acta');
        $id_usuarios = $this->session->userdata('id_usuarios');
        $rol = $this->session->userdata('rol');
        $fecha = date('Y-m-d H:i:s');
        $datos_acta = array(
            'acta' => $acta,
            'fecha' => $fecha,
            'id_usuarios' => $id_usuarios,
        );
        $this->form_validation->set_rules("acta", "acta", "required");
        if ($this->form_validation->run()) {
            if ($this->Libro_guardia_model->guardarLibroGuardia($rol, $datos_acta)) {
                redirect(base_url() . "Formularios/Libro_guardia");
            } else {
                $this->session->set_flashdata("error", "No se pudo guardar la informacion");
            }
        } else {
            $this->index();
        }
    }
    public function getActasAjax()
    {
        $rol = $this->session->userdata('rol');
        $id_usuarios = $this->session->userdata('id_usuarios');
        $actas = $this->Libro_guardia_model->getLibrosdeGuardia($rol, $id_usuarios);
        echo json_encode($actas);
    }
    public function borrarActa($id_libro_guardia)
    {
        $this->Libro_guardia_model->borrar($id_libro_guardia);
        echo "formularios/Libro_guardia";
    }
}
