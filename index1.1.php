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
//vp();
// if(isset($_POST)){
// 	l($_POST);
// }

// if(isset($_GET)){
// 	l($_GET);
// }
//mostrarGETEPara();
//g();
//p();
//gp();
//pp();
//r();
//s();
//rp();
//session_start();
//$_SESSION['user']='garou';
//sp();
lp($a='teste');

?>
<html>
<head></head>
<body>
	<form action='index1.1.php' method='post'>
		<INPUT type="text" name="atributo1">
		<INPUT type="text" name="atributo2">
		<INPUT type="submit" value="Enviar">
		<INPUT type="reset">
	</form>
	<form action='index1.1.php' method='get'>
		<INPUT type="text" name="atributo1">
		<INPUT type="text" name="atributo2">
		<INPUT type="submit" value="Enviar">
		<INPUT type="reset">
	</form>
</body>
</html>