<?php 
session_start();
require('config.php');

require 'Classes/Route.php';
require 'Classes/Controller.php';
require 'Classes/Model.php';

require 'Controller/Admin.php';
require 'Controller/Products.php';
require 'Controller/Users.php';

require 'Model/AdminModel.php';
require 'Model/ProductModel.php';
require 'Model/UserModel.php';

$route = new Route($_GET);

$route->validate();

 ?>