<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Control extends BaseController
{

  function __construct()
  {
    parent::__construct();
  }


  public function index()
  {
    $datos = array(
      'categoria_visitas' => $this->Categoria_visita_model->getCategorias(),
      'copropietarios' => $this->Copropietario_model->getCopropietarios(),
    );

    $this->loadView('Control', '/forms/formularios/control/list', $datos);
  }
  public function guardarControl()
  {
    $nombre = $this->input->post('nombre');
    $apellidos = $this->input->post('apellidos');
    $ci = $this->input->post('ci');
    $id_cateogoria_visita = $this->input->post('id_cateogoria_visita');
    $placa = $this->input->post('placa');
    $color = $this->input->post('color');
    $marca = $this->input->post('marca');
    $id_copropietario = $this->input->post('id_copropietario');
  }
}
