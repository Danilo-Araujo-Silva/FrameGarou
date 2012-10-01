<?php

if(file_exists('garoudebug.php')){
  include('garoudebug.php');
}else{
  echo '<br>garoudebug não achado<br>';
  exit;
}

$vetor['alfa'] = 'ALFA';
$vetor['beta'] = 'BETA';
$vetor['gamma']= 'GAMMA';

$variavel = '123';

//garou();
//$valor=print_r($vetor);
//  legivelPara($vetor,'vetor1');
//  legivel($vetor,'vetor2');
//  legivel($vetor['alfa'],'vetor3');
//echo nomeVariavel($vetor['beta']);
//echo getVarName($variavel);

//     $variableName = "ajaxmint";
// 
//     echo getVarName('$variableName');
// 
//     function getVarName($name) {
//         return str_replace('$','',$name);
//     }

//legivel($variavel,'variavel1');

//echo var_name($variavel,get_defined_vars());

//$my_global_variable = "My global string.";
  //echo vname($vetor); // Outputs:  my_global_variable
  
//legivelPara($variavel);
//echo "<br>";
//nomeVariavel($vetor);

//legivel($vetor,nomeVariavel($vetor));
//legivelPara($vetor);

l($vetor);
l($variavel);
lp($vetor);
l($vetor);

?>