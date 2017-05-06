<?php

class Route{
	protected $controller, $action, $id, $page;

	public function __construct($request){
		if($request['controller'] == ''){

			$this->controller = 'home';

		}else{

			$this->controller = $request['controller'];

		}

		if($request['action'] == ''){

			$this->action = 'index';

		}else{
			$this->action = $request['action'];
		}
        $this->id = $request['id'];

	}

	public function validate(){
		if(class_exists($this->controller)){
			if(in_array('Controller', class_parents($this->controller))){
				if(method_exists($this->controller, $this->action)){
					return new $this->controller($this->action,$this->id);
				}else{
					echo "Method not Found";
				}
			}else{
				echo "Parent class Not Found";
			}
		}else{
			echo "Class Not Found";
		}
	}
}