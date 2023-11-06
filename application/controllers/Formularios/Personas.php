<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Personas extends BaseController
{
    public function buscarPersonaNombre()
    {
        $nombre = $this->input->post('valor');
        $persona = $this->Persona_model->buscarPersonaXNombre($nombre);
        echo json_encode($persona);
    }
    public function buscarPersonaCi()
    {
        $ci = $this->input->post('valor');
        $persona = $this->Persona_model->buscarPersonaXCi($ci);
        echo json_encode($persona);
    }
}
