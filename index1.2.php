<?php
//C�digo para inclus�o no arquivo a ser debugado:
//------------------------------------------------------------
if(file_exists('garoudebug1.2.php')){
  include('garoudebug1.2.php');
}else{
  echo '<br>garoudebug n�o achado<br>';
  exit;
}
//------------------------------------------------------------
//Opcional:
//garou();
debug_print_backtrace();
?>