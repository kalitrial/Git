<?php

/**
 * Created by PhpStorm.
 * User: geek-station
 * Date: 30/04/17
 * Time: 21:46
 */
class ProductModel extends Model
{
    public function add(){
        if(isset($_POST['post'])){
            $product_name = $_POST['product_name'];
            $desc = $_POST['desc'];
            $status = $_POST['status'];
            $price = $_POST['price'];
            $price_type = $_POST['price_type'];
            $pic = $_FILES['image']['name'];
            $pic_tmp = $_FILES['image']['tmp_name'];
            $user_id = $_SESSION['admin']['id'];
            $token = md5(random_int(10000,100000));

            move_uploaded_file($pic_tmp,'/opt/lampp/htdocs/ad-site/assets/uploads/'.$pic);

            $this->prepareQuery("INSERT INTO `products`(`name`,`desc`,`price`,`price_type`,`user_id`,`status`) VALUES('$product_name','$desc','$price','$price_type','$user_id','$status')");
            $this->executeQuery();
            if($this->lastInsertedId()){
                $this->prepareQuery("SELECT id FROM `products` WHERE `name`='$product_name' AND `desc`='$desc' AND `price`='$price' AND `price_type`='$price_type' AND `user_id`='$user_id' AND `status`='$status'");
                $product_id = $this->Single();
                $product_id = $product_id['id'];

                $this->prepareQuery("INSERT INTO `images`(`name`,`product_id`) VALUES('$pic','$product_id')");
                $this->executeQuery();
                if($this->lastInsertedId()){
                    if(isset($_SESSION['admin'])){
                        header('Location: '.ROOT_URL.'admin/panel');
                    }else{
                        //my products
                    }
                }
            }


        }
    }

}