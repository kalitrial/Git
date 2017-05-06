<?php

/**
 * Created by PhpStorm.
 * User: geek-station
 * Date: 02/05/17
 * Time: 11:25
 */
class UserModel extends Model{

    public function register(){
        if(isset($_POST['post'])){
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $username = $_POST['username'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $pass = md5($_POST['pass']);
            $cpass =md5($_POST['cpass']);


            if($pass == $cpass){
                $this->prepareQuery("INSERT INTO users(fname,lname,username,phone,email,password) VALUES('$fname','$lname','$username','$phone','$email','$pass')");
                $this->executeQuery();

                if($this->lastInsertedId()){
                    echo "Registered";
                }else{
                    echo "Failed";
                }
            }
        }
    }

}