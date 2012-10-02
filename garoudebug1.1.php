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
  echo '<br>GarouDebug não encontrado.<br>';
  exit;
}
//------------------------------------------------------------
//Opcional:
garou();

*/

function d($texto=null){
//Alias para a função imprimeTextoLegivel.
    $backtrace = debug_backtrace();
    $chamada = array_shift($backtrace);
    
    $linha = $chamada['line'];
    $arquivo = $chamada['file'];
    imprimeTextoLegivel($texto,$linha,$arquivo);
}

function dp($texto=null){
//Alias para a função imprimeTextoLegivel mas para a execução.
    $backtrace = debug_backtrace();
    $chamada = array_shift($backtrace);
    
    $linha = $chamada['line'];
    $arquivo = $chamada['file'];
    imprimeTextoLegivel($texto,$linha,$arquivo);
    exit;
}

function garou(){
//Confirma se o debugador foi incluído corretamente.
    $mensagem='GarouDebug está funcionando corretamente.';
    imprimeVariavelLegivel($mensagem);
    exit;
}

function imprimeTextoLegivel($texto=null,$linha=null,$arquivo=null){
//Imprime um texto de forma legível. Se não houver texto imprive uma
//  mensagem padronizada.
    if(!isset($linha) or !isset($arquivo)){
        $backtrace = debug_backtrace();
        $chamada = array_shift($backtrace);
        
        $linha = $chamada['line'];
        $arquivo = $chamada['file'];
    }
    
    $cabecalho  = "\n";
    $cabecalho .= "<br>";
    $cabecalho .= "Linha: ";
    $cabecalho .= $linha;
    $cabecalho .= "\n";
    $cabecalho .= "<br>";
    $cabecalho .= "Arquivo: ";
    $cabecalho .= $arquivo;
    
    echo $cabecalho;
    
    
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
    $backtrace = debug_backtrace();
    $chamada = array_shift($backtrace);
    
    $linha = $chamada['line'];
    $arquivo = $chamada['file'];
    
    legivel($parametro,$linha,$arquivo);
}

function legivel(&$parametro=null,$linha=null,$arquivo=null){
//Não completamente implementada ainda. 
//Se não passado nenhum parâmetro, imprime o nome do arquivo vigente e o número
//  da linha corrente de forma legível.
// 
//Se passado o nome de uma variável (podendo ser um vetor), imprime o nome do
//  arquivo vigente, o número da linha, o nome da variável e o seu conteúdo de
//  legíveis.
    
    if(!isset($linha) or !isset($arquivo)){
        $backtrace = debug_backtrace();
        $chamada = array_shift($backtrace);
        
        $linha = $chamada['line'];
        $arquivo = $chamada['file'];
    }
    
    $cabecalho  = "\n";
    $cabecalho .= "<br>";
    $cabecalho .= "Linha: ";
    $cabecalho .= $linha;
    $cabecalho .= "\n";
    $cabecalho .= "<br>";
    $cabecalho .= "Arquivo: ";
    $cabecalho .= $arquivo;
    
    echo $cabecalho;
    
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

function legivelEPara(&$parametro=null,$linha=null,$arquivo=null){
//Não completamente implementada ainda. 
//Se não passado nenhum parâmetro, imprime o nome do arquivo vigente e o número
//  da linha corrente de forma legível. Para a execução neste ponto.
// 
//Se passado o nome de uma variável (podendo ser um vetor), imprime o nome do
//  arquivo vigente, o número da linha, o nome da variável e o seu conteúdo de
//  legíveis. Para a execução neste ponto.
    legivel($parametro,$linha,$arquivo);
    exit;
    
}

function linhaEArquivo(){
    $backtrace = debug_backtrace();
    $chamada = array_shift($backtrace);
    echo $chamada['line'];
    //l($chamada['line']);
}

function lp(&$parametro=null){
//Alias para a função legivelEPara.

    $backtrace = debug_backtrace();
    $chamada = array_shift($backtrace);
    
    $linha = $chamada['line'];
    $arquivo = $chamada['file'];
    
    legivelEPara($parametro,$linha,$arquivo);
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

function mostrarSessao(){
//Mostra os valores das variaveis da sessão.
    legivel($_SESSION);
}

function mostrarSessaoEPara(){
//Mostra os valores das variaveis da sessão. Para a execução.
    legivelEPara($_SESSION);
}

function mostraVariaveisEConstantes(){
//Mostra os valores das variáveis vigentes.
    legivel($GLOBALS);
    legivel(get_defined_constants());
}

function mostraVariaveisEConstantesEPara(){
//Mostra os valores das variáveis vigentes. Para a execução.
    legivel($GLOBALS);
    legivelEPara(get_defined_constants());
}

function s(){
//Alias para a função mostrarSessao.
    mostrarSessao();
}

function sp(){
//Alias para a função mostrarSessaoEPara.
    mostrarSessaoEPara();
}

function v(){
//Alias para a função mostraVariaveisEConstantes.
    mostraVariaveisEConstantes();
}

function vp(){
//Alias para a função mostraVariaveisEConstantesEPara.
    mostraVariaveisEConstantesEPara();
}

?>