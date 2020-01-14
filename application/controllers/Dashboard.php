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
    $datos = array(
        
      );
  
      $this->loadView('Dashboard', 'dashboard', $datos);
  }
}