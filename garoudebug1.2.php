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

function d($texto=null){
//Alias para a função imprimeTextoLegivel.
    imprimeTextoLegivel($texto);
}

function garou(){
//Confirma se o debugador foi incluído corretamente.
    $mensagem='GarouDebug está funcionando corretamente.';
    imprimeVariavelLegivel($mensagem);
    exit;
}

function imprimeTextoLegivel($texto=null){
//Imprime um texto de forma legível. Se não houver texto imprive uma
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
//Imprime o conteúdo de uma variável de forma legível.
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
//Imprime o conteúdo de um vetor de forma legível.
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
//Alias para a função legivel.
    legivel($parametro);
}

function legivel(&$parametro=null){
//Não completamente implementada ainda. 
//Se não passado nenhum parâmetro, imprime o nome do arquivo vigente e o número
//  da linha corrente de forma legível.
// 
//Se passado o nome de uma variável (podendo ser um vetor), imprime o nome do
//  arquivo vigente, o número da linha, o nome da variável e o seu conteúdo de
//  legíveis.
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
//Não completamente implementada ainda. 
//Se não passado nenhum parâmetro, imprime o nome do arquivo vigente e o número
//  da linha corrente de forma legível. Para a execução neste ponto.
// 
//Se passado o nome de uma variável (podendo ser um vetor), imprime o nome do
//  arquivo vigente, o número da linha, o nome da variável e o seu conteúdo de
//  legíveis. Para a execução neste ponto.
    legivel($parametro);
    exit;
    
}

function lp(&$parametro=null){
//Alias para a função legivelEPara.
    legivelEPara($parametro);
}

function nomeVariavel(&$variavel, $escopo=false, $prefixo='unique', $sufixo='value'){
//Retorna o nome da variável passada.
//Necessário entender o código e vertê-lo para o português e melhorar os nomes.
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
//Mostra os valores das variáveis vigentes.
    legivel($GLOBALS);
}

function mostraVariaveisEPara(){
//Mostra os valores das variáveis vigentes. Para a execução.
    legivelEPara($GLOBALS);
}

function v(){
//Alias para a função mostraVariaveis.
    mostraVariaveis();
}

function vp(){
//Alias para a função mostraVariaveisEPara.
    mostraVariaveisEPara();
}

?>