<?php

class AdminModel extends Model{

	public function register(){

		if(isset($_POST['post'])){
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$phone = $_POST['phone'];
			$email = $_POST['email'];
			$username = $_POST['username'];
			$pass = md5($_POST['pass']);
			$cpass =md5($_POST['cpass']);

			if($pass == $cpass){
				$this->prepareQuery("INSERT INTO users(fname,lname,username,phone,email,password,type) VALUES('$fname','$lname','$username','$phone','$email','$pass',1)");
				$this->executeQuery();

				if($this->lastInsertedId()){
					header('Location: '.ROOT_URL.'admin/login');
				}else{
					echo "Failed";
				}
			}

		}
	}

	public function login(){
		if(isset($_POST['post'])){
		
		
			$email = $_POST['email'];
			$pass = md5($_POST['pass']);


			$this->prepareQuery("SELECT * FROM `users` WHERE email='$email' AND password='$pass' AND `type`=1 ");
			$data = $this->resultSet();

			if(count($data)==1){
				
				$_SESSION['admin'] = array(
				    'name' => $data[0]['username'],
                    'id' => $data[0]['id'],
                    'email' => $data[0]['email'],
                );

				header('Location: '.ROOT_URL.'admin/panel');

				return $data;
				
			}else{
				echo "failed";
			}
		
		}
	}

	public function panel(){

    }

    public function products($status){


	    if(!empty($status)){

                if($status == "inactive"){
                    $this->prepareQuery("SELECT count(`id`) FROM `products` WHERE `status`='$status'");
                    $count = $this->resultSet();
                    $count = $count[0]['count(`id`)'];
                    $this->prepareQuery("SELECT * FROM `products` WHERE `status`='$status'");
                }elseif ($status == "active"){
                    $this->prepareQuery("SELECT count(`id`) FROM `products` WHERE `status`='$status'");
                    $count = $this->resultSet();
                    $count = $count[0]['count(`id`)'];
                    $this->prepareQuery("SELECT * FROM `products` WHERE `status`='$status' ");
                }elseif (!empty($status)){
                    $this->prepareQuery("SELECT * FROM `products` WHERE `user_id`='$status' ");
                    $this->prepareQuery("SELECT count(`id`) FROM `products` WHERE `status`='$status'");
                    $count = $this->resultSet();
                    $count = $count[0]['count(`id`)'];
                }

            if(isset($_POST['search'])){
                $item = $_POST['item'];
                $this->prepareQuery("SELECT * FROM `products` WHERE `status`='$status' AND `name` LIKE '%$item%' OR `desc` LIKE '%$item%'  ");

            }

        }else{
            if(isset($_POST['search'])){
                $item = $_POST['item'];
                $this->prepareQuery("SELECT * FROM `products` WHERE `name` LIKE '%$item%' OR `desc` LIKE '%$item%' ");
            }else{
                $this->prepareQuery("SELECT * FROM `products` ");
            }
        }
	    $data = $this->resultSet();
	    return $data;
    }

    public function details($id){
        $this->prepareQuery("SELECT * FROM `products` WHERE `id`='$id' ");
        $data = $this->resultSet();
        return $data;
    }

    public function user($id){
        if($_SESSION['admin']){
            $this->prepareQuery("SELECT * FROM `users` WHERE `id`='$id' ");
        }
        $data = $this->resultSet();
        return $data;
    }

    public function edituser($id){
        if(isset($_POST['edituser'])){
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $username = $_POST['username'];
            $pass = md5($_POST['pass']);

            $this->prepareQuery("UPDATE `users` SET `fname`='$fname', `lname`='$lname', `username`='$username', `phone`='$phone', `email`='$email', `password`='$pass' WHERE `id`='$id'");
            $this->executeQuery();

            header('Location: '.ROOT_URL.'admin/user/'.$id);
        }
    }

    public function users($id){
        if($_SESSION['admin']){
            if($id == 'admin'){
                $this->prepareQuery("SELECT * FROM `users` WHERE `type`=1");
            }elseif($id == 'user'){
                $this->prepareQuery("SELECT * FROM `users` WHERE `type`=0 ");
            }else{
                if($id == 'search'){
                    if(isset($_POST['search'])){
                        $item = $_POST['item'];
                    }
                    $this->prepareQuery("SELECT * FROM `users` WHERE `username` LIKE '%$item%' OR `fname` LIKE '%$item%' OR `lname` LIKE '%$item%' OR `id` LIKE '%$item%'  ");
                }else{
                    $this->prepareQuery("SELECT * FROM `users` ORDER BY `type` DESC ");
                }
            }
        }
        $data = $this->resultSet();
        return $data;
    }

    public function editdetails($id){
        $product_name = $_POST['product_name'];
        $desc = $_POST['desc'];
        $status = $_POST['status'];
        $price = $_POST['price'];
        $price_type = $_POST['price_type'];

        $this->prepareQuery("UPDATE `products` SET `name`='$product_name',`desc`='$desc',`price`='$price',`price_type`='$price_type',`status`='$status' WHERE id='$id'");
        $this->executeQuery();

        header('Location: '.ROOT_URL.'admin/details/'.$id);

    }

}