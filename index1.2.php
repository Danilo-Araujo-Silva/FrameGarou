<?php
//Código para inclusão no arquivo a ser debugado:
//------------------------------------------------------------
if(file_exists('garoudebug1.2.php')){
  include('garoudebug1.2.php');
}else{
  echo '<br>garoudebug não achado<br>';
  exit;
}
//------------------------------------------------------------
//Opcional:
//garou();
debug_print_backtrace();
?>