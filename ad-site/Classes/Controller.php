<?php

abstract class Controller{

	protected $action;

	public function __construct($action, $id){

		$this->action = $action;
		$this->{$this->action}($id); //homeobject->index();

	}

	public function returnView($data){
		$path = 'View/'.get_class($this).'/'.$this->action.'.php';
		if(get_class($this) == 'Admin'){
		    require 'View/Admin/main.php';
        }else{
            require 'View/main.php';
        }

	}
}