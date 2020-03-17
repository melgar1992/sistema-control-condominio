<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends BaseController
{

  function __construct()
  {
    parent::__construct();
  }


  public function index()
  {
                 
    $data = array(
      'categoria_visitas' => $this->Categoria_visita_model->getCategorias(),
      'copropietarios' => $this->Copropietario_model->getCopropietarios(),
      'control_visitas' => $this->Control_model->getControl_ingreso(),
      'usuarios' => $this->Usuario_model->getUsuarios(),
      'visitas_mes' => $this->Control_model->getControl_ingreso_por_mes(date('Y-m')),
    );

    $this->loadView("Dashboard", "dashboard", $data);
  }
  public function buscar()
  {
    $fechainicio = $this->input->post("fechainicio");
    $fechafin = $this->input->post("fechafin");
   
   
    $data = array(
      'categoria_visitas' => $this->Categoria_visita_model->getCategorias(),
      'copropietarios' => $this->Copropietario_model->getCopropietarios(),
      'control_visitas' => $this->Control_model->getControl_ingreso_por_fechas($fechainicio, $fechafin),
      'usuarios' => $this->Usuario_model->getUsuarios(),
      'visitas_mes' => $this->Control_model->getControl_ingreso_por_mes(date('Y-m')),
    );
    
    $this->loadView("Dashboard", "dashboard", $data);
  }
}
