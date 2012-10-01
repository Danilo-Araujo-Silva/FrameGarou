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

$vetor['alfa'] = 'ALFA';
$vetor['beta'] = 'BETA';
$vetor['gamma']= 'GAMMA';

$variavel = '123';

//echo "Error at line " . __LINE__ . " in file " . __FILE__;
//echo nomeVariavel($vetor);
// legivelEPara($vetor);
// legivel($variavel);
// legivelEPara($variavel);
// legivel($variavel);
// l($vetor);
// l($variavel);
// // lp($variavel);
// lp();
// l();
// lp($vetor);
//l();
//d();
//mostraVariaveis();
// v();
// vp();
// v();
?>