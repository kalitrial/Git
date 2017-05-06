<?php

class Admin extends Controller{

	public function register(){
		$model =new AdminModel;
		$data = $model->register();
		$this->returnView($data);
	}

	public function login(){
		$model =new AdminModel;
		$data = $model->login();
		$this->returnView($data);
	}

	public function panel(){
	    $model = new AdminModel();
	    $data = $model->panel();
	    $this->returnView($data);
    }

    public function logout(){
	    session_unset();
	    session_destroy();
	    header('Location: '.ROOT_URL.'/admin/login');
    }

    public function products($status){
        $model = new AdminModel();
        $data = $model->products($status);
        $this->returnView($data);
    }

    public function details($id){
        $model = new AdminModel();
        $data =$model->details($id);
        $this->returnView($data);
    }

    public function user($id){
        $model = new AdminModel();
        $data = $model->user($id);
        $this->returnView($data);
    }

    public function edituser($id){
        $model = new AdminModel();
        $model->edituser($id);
    }

    public function editdetails($id){
        $model = new AdminModel();
        $data = $model->editdetails($id);
    }

    public function users($id){
        $model = new AdminModel();
        $data = $model->users($id);
        $this->returnView($data);
    }
}