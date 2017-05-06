<?php

/**
 * Created by PhpStorm.
 * User: geek-station
 * Date: 30/04/17
 * Time: 21:45
 */
class Products extends Controller
{
    public function add(){
        $prod = new ProductModel();
        $this->returnView($prod->add());
    }

}