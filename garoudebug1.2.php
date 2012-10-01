<?php
/**
Autor: Danilo Ara�jo Silva
�ltima atualiza��o: 01-10-2012
Descri��o: classe para auxiliar na inspe��o, corre��o e debuga��o de c�digos na linguagem PHP.
 T�m o objetivo de ser independente do sistema, funcionando apenas com a inclus�o deste arquivo.
*/

/*

//C�digo para inclus�o no arquivo a ser debugado:
//------------------------------------------------------------
if(file_exists('garoudebug.php')){
  include('garoudebug.php');
}else{
  echo '<br>garoudebug n�o achado<br>';
  exit;
}
//------------------------------------------------------------
//Opcional:
garou();

*/

function garou(){
//Confirma se o debugador foi inclu�do corretamente.
    $mensagem='GarouDebug est� funcionando corretamente.';
    echo legivel($mensagem);
    exit;
}

function legivel($parametro=null){
// Se n�o passado nenhum par�metro, imprime o nome do arquivo vigente e o n�mero
//  da linha corrente de forma leg�vel.
// 
// Se passado o nome de uma vari�vel (podendo ser um vetor), imprime o nome do
//  arquivo vigente, o n�mero da linha, o nome da vari�vel e o seu conte�do de
//  leg�veis.
    if($parametro===null){
        
    }else{
    
    }
}

?>