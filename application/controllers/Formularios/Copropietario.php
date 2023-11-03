<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Copropietario extends BaseController
{
    public function index()
    {
        $data = array(
            'copropietarios' => $this->Copropietario_model->getCopropietarios(),
        );

        $this->loadView('Copropietario', '/forms/formularios/copropietarios/list', $data);
    }
    public function guardarCopropietario()
    {
        $nombres = $this->input->post('nombre');
        $apellidos = $this->input->post('apellidos');
        $ci = $this->input->post('ci');
        $telefono = $this->input->post('telefono');
        $numero_vivienda = $this->input->post('numero_vivienda');
        $calle = $this->input->post('calle');
        $numero_interno = $this->input->post('numero_interno');
        $tipo_copropietario = $this->input->post('tipo_copropietario');
        $estado_propietario = $this->input->post('estado_propietario');



        $this->form_validation->set_rules("nombre", "Nombre", "required");
        $this->form_validation->set_rules("apellidos", "Apellidos", "required");
        $this->form_validation->set_rules(
            'ci',
            'ci',
            array(
                'required',
                array('validarCi', array($this->Copropietario_model, 'validarCi'))
            ),
            array('validarCi' => 'Carnet de identidad ya esta siendo ocupado')
        );
        $this->form_validation->set_rules("numero_vivienda", "Numero_vivienda", "required");
        $this->form_validation->set_rules("calle", "Calle", "required");
        $this->form_validation->set_rules("numero_interno", "Numero_interno", "required");
        $this->form_validation->set_rules("tipo_copropietario", "Tipo_copropietario", "required");
        $this->form_validation->set_rules("estado_propietario", "estado_propietario", "required");




        if ($this->form_validation->run()) {


            $datospersona = array(
                'nombres' => $nombres,
                'apellidos' => $apellidos,
                'carnet_identidad' => $ci,
                'telefono' => $telefono,

            );
            $datoscopropietarios = array(
                'numero_vivienda' => $numero_vivienda,
                'calle' => $calle,
                'numero_interno' => $numero_interno,
                'tipo_copropietario' => $tipo_copropietario,
                'estado' => "1",
                'estado_propietario' => $estado_propietario,
            );


            if ($this->Copropietario_model->guardarCopropietario($datospersona, $datoscopropietarios)) {
                redirect(base_url() . "Formularios/Copropietario");
            } else {
                $this->session->set_flashdata("error", "No se pudo guardar la informacion");
            }
        } else {
            $this->index();
        }
    }
    public function editar($id_copropietario)
    {
        $data = array(
            'copropietario' => $this->Copropietario_model->getCopropietario($id_copropietario),
        );
        $this->loadView('Copropietario', '/forms/formularios/copropietarios/editar', $data);
    }

    public function actualizarCopropietario()
    {
        $id_copropietario = $this->input->post("id_copropietario");
        $id_persona = $this->input->post("id_persona");
        $nombres = $this->input->post('nombre');
        $apellidos = $this->input->post('apellidos');
        $ci = $this->input->post('ci');
        $telefono = $this->input->post('telefono');
        $numero_vivienda = $this->input->post('numero_vivienda');
        $calle = $this->input->post('calle');
        $numero_interno = $this->input->post('numero_interno');
        $tipo_copropietario = $this->input->post('tipo_copropietario');
        $estado_propietario = $this->input->post('estado_propietario');


        $copropietarioActual = $this->Copropietario_model->getCopropietario($id_copropietario);
        if ($ci == $copropietarioActual->carnet_identidad) {

            $this->form_validation->set_rules("nombre", "Nombre", "required");
            $this->form_validation->set_rules("apellidos", "Apellidos", "required");
            $this->form_validation->set_rules("ci", "CI", "required");
            $this->form_validation->set_rules("telefono", "Telefono", "required");
            $this->form_validation->set_rules("numero_vivienda", "Numero_vivienda", "required");
            $this->form_validation->set_rules("calle", "Calle", "required");
            $this->form_validation->set_rules("numero_interno", "Numero_interno", "required");
            $this->form_validation->set_rules("tipo_copropietario", "Tipo_copropietario", "required");
        } else {
            $this->form_validation->set_rules("nombre", "Nombre", "required");
            $this->form_validation->set_rules("apellidos", "Apellidos", "required");
            $this->form_validation->set_rules(
                'ci',
                'ci',
                array(
                    'required',
                    array('validarCi', array($this->Copropietario_model, 'validarCi'))
                ),
                array('validarCi' => 'Carnet de identidad ya esta siendo ocupado')
            );
            $this->form_validation->set_rules("telefono", "Telefono", "required");
            $this->form_validation->set_rules("numero_vivienda", "Numero_vivienda", "required");
            $this->form_validation->set_rules("calle", "Calle", "required");
            $this->form_validation->set_rules("numero_interno", "Numero_interno", "required");
            $this->form_validation->set_rules("tipo_copropietario", "Tipo_copropietario", "required");
            $this->form_validation->set_rules("estado_propietario", "estado_propietario", "required");
        }

        if ($this->form_validation->run()) {

            $datospersona = array(

                'nombres' => $nombres,
                'apellidos' => $apellidos,
                'carnet_identidad' => $ci,
                'telefono' => $telefono,


            );
            $datoscopropietarios = array(
                'numero_vivienda' => $numero_vivienda,
                'calle' => $calle,
                'numero_interno' => $numero_interno,
                'tipo_copropietario' => $tipo_copropietario,
                'estado_propietario' => $estado_propietario,
                'estado' => "1"
            );

            if ($this->Copropietario_model->actualizar($id_copropietario, $id_persona, $datospersona, $datoscopropietarios)) {
                redirect(base_url() . "Formularios/Copropietario");
            } else {
                $this->session->set_flashdata("error", "No se pudo actualizar la informacion");
                redirect(base_url() . "forms/formularios/copropietarios/editar" . $id_copropietario);
            }
        } else {
            $this->Editar($id_copropietario);
        }
    }
    public function borrar($id_copropietario)
    {
        $data = array(
            'estado' => "0",
        );
        $this->Copropietario_model->borrar($id_copropietario, $data);
        echo "Formularios/Copropietario";
    }
    public function buscarCopropietariosAjax()
    {
        $nombre = $this->input->post('valor');
        $propietario = $this->Copropietario_model->buscarCopropietariosXNombre($nombre);
        echo json_encode($propietario);
    }
}
