<?php 
// O BD dele já está pronto, não ensina a criar e configurar
function connect(){
  return new PDO("mysql:host=localhost/dbname=lumen");
}

?>