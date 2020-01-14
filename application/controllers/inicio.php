<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class inicio extends BaseController {
    
    function __construct(){
		parent::__construct();			
    }    


public function index()
	{
        $data = array(
        );   
		
		$this->loadView('', '/dashboard', $data);
	}
	


}