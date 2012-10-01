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

function d($texto=null){
//Alias para a fun��o imprimeTextoLegivel.
    imprimeTextoLegivel($texto);
}

function garou(){
//Confirma se o debugador foi inclu�do corretamente.
    $mensagem='GarouDebug est� funcionando corretamente.';
    imprimeVariavelLegivel($mensagem);
    exit;
}

function imprimeTextoLegivel($texto=null){
//Imprime um texto de forma leg�vel. Se n�o houver texto imprive uma
//  mensagem padronizada.
    $retorno  = "\n";
    $retorno .= "<br>";
    
    if(isset($texto)){
        $retorno .= $texto;
    }elseif($texto===null){
        $retorno .= 'GarouDebug';
    }
    
    $retorno .= "<br>";
    $retorno .= "\n";
    
    echo $retorno;
}

function imprimeVariavelLegivel($variavel){
//Imprime o conte�do de uma vari�vel de forma leg�vel.
    $retorno  = "\n";
    $retorno .= "<br>";
    $retorno .= "<pre>";
    
    $retorno .= $variavel;
    
    $retorno .= "</pre>";
    $retorno .= "<br>";
    $retorno .= "\n";
    
    echo $retorno;
}

function imprimeVetorLegivel($vetor){
//Imprime o conte�do de um vetor de forma leg�vel.
    $retorno  = "\n";
    $retorno .= "<br>";
    $retorno .= "<pre>";
    echo $retorno;
    
    print_r($vetor);
    
    $retorno  = "\n";
    $retorno .= "</pre>";
    $retorno .= "<br>";
    echo $retorno;
}

function l(&$parametro=null){
//Alias para a fun��o legivel.
    legivel($parametro);
}

function legivel(&$parametro=null){
//N�o completamente implementada ainda. 
//Se n�o passado nenhum par�metro, imprime o nome do arquivo vigente e o n�mero
//  da linha corrente de forma leg�vel.
// 
//Se passado o nome de uma vari�vel (podendo ser um vetor), imprime o nome do
//  arquivo vigente, o n�mero da linha, o nome da vari�vel e o seu conte�do de
//  leg�veis.
    if(isset($parametro)){
      $nomeVariavel=nomeVariavel($parametro);
      
      $cabecalho  = "\n";
      $cabecalho .= "<br>";
      $cabecalho .= $nomeVariavel;
      $cabecalho .= ":";
      $cabecalho .= "<br>";
      $cabecalho .= "\n";
      
      echo $cabecalho;
      
      if(is_array($parametro)){
          imprimeVetorLegivel($parametro);
      }else{
          imprimeVariavelLegivel($parametro);
      }
    }
}

function legivelEPara(&$parametro=null){
//N�o completamente implementada ainda. 
//Se n�o passado nenhum par�metro, imprime o nome do arquivo vigente e o n�mero
//  da linha corrente de forma leg�vel. Para a execu��o neste ponto.
// 
//Se passado o nome de uma vari�vel (podendo ser um vetor), imprime o nome do
//  arquivo vigente, o n�mero da linha, o nome da vari�vel e o seu conte�do de
//  leg�veis. Para a execu��o neste ponto.
    legivel($parametro);
    exit;
    
}

function lp(&$parametro=null){
//Alias para a fun��o legivelEPara.
    legivelEPara($parametro);
}

function nomeVariavel(&$variavel, $escopo=false, $prefixo='unique', $sufixo='value'){
//Retorna o nome da vari�vel passada.
//Necess�rio entender o c�digo e vert�-lo para o portugu�s e melhorar os nomes.
    if($escopo) $valorores = $escopo;
    else      $valorores = $GLOBALS;
    $antigo = $variavel;
    $variavel = $novo = $prefixo.rand().$sufixo;
    $nomeVariavel = FALSE;
    foreach($valorores as $chave => $valor) {
      if($valor === $novo) $nomeVariavel = $chave;
    }
    $variavel = $antigo;
    return $nomeVariavel;
}

function mostraVariaveis(){
//Mostra os valores das vari�veis vigentes.
    legivel($GLOBALS);
}

function mostraVariaveisEPara(){
//Mostra os valores das vari�veis vigentes. Para a execu��o.
    legivelEPara($GLOBALS);
}

function v(){
//Alias para a fun��o mostraVariaveis.
    mostraVariaveis();
}

function vp(){
//Alias para a fun��o mostraVariaveisEPara.
    mostraVariaveisEPara();
}

?>