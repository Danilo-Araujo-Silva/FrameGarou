<?php
//Código para inclusão no arquivo a ser debugado:
//------------------------------------------------------------
if(file_exists('garoudebug1.1.php')){
  include('garoudebug1.1.php');
}else{
  echo '<br>GarouDebug não encontrado.<br>';
  exit;
}
//------------------------------------------------------------
//Opcional:
//garou();

$vetor['alfa'] = 'ALFA';
$vetor['beta'] = 'BETA';
$vetor['gamma']= 'GAMMA';

$variavel = '123';

define('__CONSTANTE__','/1/2/3');

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

//echo __CONSTANTE__;
//d(__CONSTANTE__);
//s();
// $l=__LINE__.":".__FILE__;
// dp($l);

// $msg='teste';
// log1();
// 
// function log1(){
//   $bt = debug_backtrace();
//   $caller = array_shift($bt);
//   
//   l($bt);
//   l($caller);
// }

//linhaEArquivo();
//legivel($vetor);
// lp();
// l($vetor);
// lp($vetor);
vp();

?>