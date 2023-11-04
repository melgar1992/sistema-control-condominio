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
}
