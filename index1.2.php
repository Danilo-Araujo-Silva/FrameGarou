<?php
//Código para inclusão no arquivo a ser debugado:
//------------------------------------------------------------
if(file_exists('garoudebug1.2.php')){
  include('garoudebug1.2.php');
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

//l(get_defined_vars());

//l($GLOBALS);

//v();
//vc();
//vp();
//vcp();
//l($vetor);
//d('asdfadsf');

?>

<html>
<head></head>
<body>
	<form action='index1.2.php' method='post'>
		<INPUT type="text" name="atributo1">
		<INPUT type="text" name="atributo2">
		<INPUT type="submit" value="Enviar">
		<INPUT type="reset">
	</form>
	<form action='index1.2.php' method='get'>
		<INPUT type="text" name="atributo1">
		<INPUT type="text" name="atributo2">
		<INPUT type="submit" value="Enviar">
		<INPUT type="reset">
	</form>
</body>
</html>