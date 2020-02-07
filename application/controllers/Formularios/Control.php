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
        
      );
  
      $this->loadView('Control', '/forms/formularios/control/list', $datos);
  }
}