<?php

/**
 * Created by PhpStorm.
 * User: geek-station
 * Date: 02/05/17
 * Time: 11:24
 */
class Users extends Controller{

    public function register(){
        $model = new UserModel();
        $data = $model->register();
        $this->returnView($data);
    }
}