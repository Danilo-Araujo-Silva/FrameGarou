<?php
/**
Autor: Danilo Araújo Silva
Última atualização: 01-10-2012
Descrição: classe para auxiliar na inspeção, correção e debugação de códigos na linguagem PHP.
 Têm o objetivo de ser independente do sistema, funcionando apenas com a inclusão deste arquivo.
*/

/*

//Código para inclusão no arquivo a ser debugado:
//------------------------------------------------------------
if(file_exists('garoudebug.php')){
  include('garoudebug.php');
}else{
  echo '<br>garoudebug não achado<br>';
  exit;
}
//------------------------------------------------------------
//Opcional:
garou();

*/

function garou(){
//Confirma se o debugador foi incluído corretamente.
    $mensagem='GarouDebug está funcionando corretamente.';
    echo legivel($mensagem);
    exit;
}

function legivel($parametro=null){
// Se não passado nenhum parâmetro, imprime o nome do arquivo vigente e o número
//  da linha corrente de forma legível.
// 
// Se passado o nome de uma variável (podendo ser um vetor), imprime o nome do
//  arquivo vigente, o número da linha, o nome da variável e o seu conteúdo de
//  legíveis.
    if($parametro===null){
        
    }else{
    
    }
}

?>