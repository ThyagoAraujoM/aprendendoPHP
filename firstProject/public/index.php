<?php
  require 'bootstrap.php';
  try {
    $data = router();  
    
    if(!isset($data['data'])){
      throw new Exception('O índide data está faltando');
    }
    if(!isset($data['view'])){
      throw new Exception('O índice view está faltando');
    }
    if(!file_exists(VIEW.$data['view'])){
      throw new Exception("Essa página {$data['view']} não existe");
    }
    
    extract($data['data']);
    $view = $data['view'];
    
    require VIEW."index.view.php";
  } catch (Exception $e) {
    var_dump($e->getMessage());
  }
  
?>