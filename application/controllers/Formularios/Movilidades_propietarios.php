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
}
