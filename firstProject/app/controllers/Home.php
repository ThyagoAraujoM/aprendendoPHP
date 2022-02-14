<?php 

namespace app\controllers;

class Home{
  public function index($params){
    return [
      'view' => 'home.view.php',
      "data" => ['title' => 'Home']
    ];
  }
}

?>