<?php
/**
Autor: Danilo Araújo Silva
Última atualização: 05-10-2012
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

function m($texto=null){
//Alias para a função imprimeTextoLegivel.
    $backtrace = debug_backtrace();
    $chamada = array_shift($backtrace);
    
    $linha = $chamada['line'];
    //$arquivo = $chamada['file'];
    $arquivo = $_SERVER['PHP_SELF'];

    imprimeTextoLegivel($texto,$linha,$arquivo);
}

function mp($texto=null){
//Alias para a função imprimeTextoLegivel mas para a execução.
    $backtrace = debug_backtrace();
    $chamada = array_shift($backtrace);
    
    $linha = $chamada['line'];
    //$arquivo = $chamada['file'];
    $arquivo = $_SERVER['PHP_SELF'];

    imprimeTextoLegivel($texto,$linha,$arquivo);
    exit;
}

function g(){
//Alias para a função mostraGET.
    if(!isset($linha) or !isset($arquivo)){
        $backtrace = debug_backtrace();
        $chamada = array_shift($backtrace);
        
        $linha = $chamada['line'];
        //$arquivo = $chamada['file'];
        $arquivo = $_SERVER['PHP_SELF'];
    }

    mostraGET($linha,$arquivo);
}

function garou(){
//Confirma se o debugador foi incluído corretamente.
    $mensagem='GarouDebug está funcionando corretamente.';
    imprimeVariavelLegivel($mensagem);
    exit;
}

function gp(){
//Alias para a função mostraGETEPara.
    if(!isset($linha) or !isset($arquivo)){
        $backtrace = debug_backtrace();
        $chamada = array_shift($backtrace);
        
        $linha = $chamada['line'];
        //$arquivo = $chamada['file'];
        $arquivo = $_SERVER['PHP_SELF'];
    }

    mostraGETEPara($linha,$arquivo);
}

function imprimeTextoLegivel($texto=null,$linha=null,$arquivo=null){
//Imprime um texto de forma legível. Se não houver texto imprive uma
//  mensagem padronizada.
    if(!isset($linha) or !isset($arquivo)){
        $backtrace = debug_backtrace();
        $chamada = array_shift($backtrace);
        
        $linha = $chamada['line'];
        //$arquivo = $chamada['file'];
        $arquivo = $_SERVER['PHP_SELF'];
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
    //$arquivo = $chamada['file'];
    $arquivo = $_SERVER['PHP_SELF'];
    
    legivel($parametro,$linha,$arquivo);
}

function legivel(&$parametro=null,$linha=null,$arquivo=null){ 
//Se não passado nenhum parâmetro, imprime o nome do arquivo vigente e o número
//  da linha corrente de forma legível.
// 
//Se passado o nome de uma variável (podendo ser um vetor), imprime o nome do
//  arquivo vigente, o número da linha, o nome da variável e o seu conteúdo de
//  legíveis.
    if($parametro!=null){
        if(!isset($linha) or !isset($arquivo)){
            $backtrace = debug_backtrace();
            $chamada = array_shift($backtrace);
            
            $linha = $chamada['line'];
            //$arquivo = $chamada['file'];
            $arquivo = $_SERVER['PHP_SELF'];
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
    }else{
        m();
    }
}

function legivelEPara(&$parametro=null,$linha=null,$arquivo=null){
//Se não passado nenhum parâmetro, imprime o nome do arquivo vigente e o número
//  da linha corrente de forma legível. Para a execução neste ponto.
// 
//Se passado o nome de uma variável (podendo ser um vetor), imprime o nome do
//  arquivo vigente, o número da linha, o nome da variável e o seu conteúdo de
//  legíveis. Para a execução neste ponto.
    if($parametro!=null){
        legivel($parametro,$linha,$arquivo);
    }else{
        mp();
    }
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
    //$arquivo = $chamada['file'];
    $arquivo = $_SERVER['PHP_SELF'];
    
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

function mostraGET($linha=null,$arquivo=null){
//Mostra os valores da variável GET.
    if(!isset($linha) or !isset($arquivo)){
        $backtrace = debug_backtrace();
        $chamada = array_shift($backtrace);
        
        $linha = $chamada['line'];
        //$arquivo = $chamada['file'];
        $arquivo = $_SERVER['PHP_SELF'];
    }

    legivel($_GET,$linha,$arquivo);
}

function mostraGETEPARA($linha=null,$arquivo=null){
//Mostra os valores da variável GET. Para a execução.
    if(!isset($linha) or !isset($arquivo)){
        $backtrace = debug_backtrace();
        $chamada = array_shift($backtrace);
        
        $linha = $chamada['line'];
        //$arquivo = $chamada['file'];
        $arquivo = $_SERVER['PHP_SELF'];
    }

    legivelEPara($_GET,$linha,$arquivo);
}

function mostraPOST($linha=null,$arquivo=null){
//Mostra os valores da variável POST.
    if(!isset($linha) or !isset($arquivo)){
        $backtrace = debug_backtrace();
        $chamada = array_shift($backtrace);
        
        $linha = $chamada['line'];
        //$arquivo = $chamada['file'];
        $arquivo = $_SERVER['PHP_SELF'];
    }

    legivel($_POST,$linha,$arquivo);
}

function mostraPOSTEPARA($linha=null,$arquivo=null){
//Mostra os valores da variável POST. Para a execução.
    if(!isset($linha) or !isset($arquivo)){
        $backtrace = debug_backtrace();
        $chamada = array_shift($backtrace);
        
        $linha = $chamada['line'];
        //$arquivo = $chamada['file'];
        $arquivo = $_SERVER['PHP_SELF'];
    }

    legivelEPara($_POST,$linha,$arquivo);
}

function mostraREQUEST($linha=null,$arquivo=null){
//Mostra os valores da variável REQUEST.
    if(!isset($linha) or !isset($arquivo)){
        $backtrace = debug_backtrace();
        $chamada = array_shift($backtrace);
        
        $linha = $chamada['line'];
        //$arquivo = $chamada['file'];
        $arquivo = $_SERVER['PHP_SELF'];
    }

    legivel($_REQUEST,$linha,$arquivo);
}

function mostraREQUESTEPARA($linha=null,$arquivo=null){
//Mostra os valores da variável REQUEST. Para a execução.
    if(!isset($linha) or !isset($arquivo)){
        $backtrace = debug_backtrace();
        $chamada = array_shift($backtrace);
        
        $linha = $chamada['line'];
        //$arquivo = $chamada['file'];
        $arquivo = $_SERVER['PHP_SELF'];
    }

    legivelEPara($_REQUEST,$linha,$arquivo);
}

function mostraSESSION($linha=null,$arquivo=null){
//Mostra os valores das variaveis da sessão.
    if(!isset($linha) or !isset($arquivo)){
        $backtrace = debug_backtrace();
        $chamada = array_shift($backtrace);
        
        $linha = $chamada['line'];
        //$arquivo = $chamada['file'];
        $arquivo = $_SERVER['PHP_SELF'];
    }

    legivel($_SESSION,$linha,$arquivo);
}

function mostraSESSIONEPara($linha=null,$arquivo=null){
//Mostra os valores das variaveis da sessão. Para a execução.
    if(!isset($linha) or !isset($arquivo)){
        $backtrace = debug_backtrace();
        $chamada = array_shift($backtrace);
        
        $linha = $chamada['line'];
        //$arquivo = $chamada['file'];
        $arquivo = $_SERVER['PHP_SELF'];
    }

    legivelEPara($_SESSION,$linha,$arquivo);
}

function mostraVariaveis($linha=null,$arquivo=null){
//Mostra os valores das variáveis vigentes.
    if(!isset($linha) or !isset($arquivo)){
        $backtrace = debug_backtrace();
        $chamada = array_shift($backtrace);
        
        $linha = $chamada['line'];
        //$arquivo = $chamada['file'];
        $arquivo = $_SERVER['PHP_SELF'];
    }

    legivel($GLOBALS,$linha,$arquivo);
}

function mostraVariaveisEPara($linha=null,$arquivo=null){
//Mostra os valores das variáveis vigentes. Para a execução.
    if(!isset($linha) or !isset($arquivo)){
        $backtrace = debug_backtrace();
        $chamada = array_shift($backtrace);
        
        $linha = $chamada['line'];
        //$arquivo = $chamada['file'];
        $arquivo = $_SERVER['PHP_SELF'];
    }

    legivelEPara($GLOBALS,$linha,$arquivo);
}

function mostraVariaveisEConstantes($linha=null,$arquivo=null){
//Mostra os valores das variáveis vigentes.
    if(!isset($linha) or !isset($arquivo)){
        $backtrace = debug_backtrace();
        $chamada = array_shift($backtrace);
        
        $linha = $chamada['line'];
        //$arquivo = $chamada['file'];
        $arquivo = $_SERVER['PHP_SELF'];
    }

    legivel($GLOBALS,$linha,$arquivo);
    legivel(get_defined_constants(),$linha,$arquivo);
}

function mostraVariaveisEConstantesEPara($linha=null,$arquivo=null){
//Mostra os valores das variáveis vigentes. Para a execução.
    if(!isset($linha) or !isset($arquivo)){
        $backtrace = debug_backtrace();
        $chamada = array_shift($backtrace);
        
        $linha = $chamada['line'];
        //$arquivo = $chamada['file'];
        $arquivo = $_SERVER['PHP_SELF'];
    }

    legivel($GLOBALS,$linha,$arquivo);
    legivelEPara(get_defined_constants(),$linha,$arquivo);
}

function p(){
//Alias para a função mostraPOST.
    if(!isset($linha) or !isset($arquivo)){
        $backtrace = debug_backtrace();
        $chamada = array_shift($backtrace);
        
        $linha = $chamada['line'];
        //$arquivo = $chamada['file'];
        $arquivo = $_SERVER['PHP_SELF'];
    }

    mostraPOST($linha,$arquivo);
}

function pp(){
//Alias para a função mostraPOSTEPara.
    if(!isset($linha) or !isset($arquivo)){
        $backtrace = debug_backtrace();
        $chamada = array_shift($backtrace);
        
        $linha = $chamada['line'];
        //$arquivo = $chamada['file'];
        $arquivo = $_SERVER['PHP_SELF'];
    }

    mostraPOSTEPara($linha,$arquivo);
}

function r(){
//Alias para a função mostraREQUEST.
    if(!isset($linha) or !isset($arquivo)){
        $backtrace = debug_backtrace();
        $chamada = array_shift($backtrace);
        
        $linha = $chamada['line'];
        //$arquivo = $chamada['file'];
        $arquivo = $_SERVER['PHP_SELF'];
    }

    mostraREQUEST($linha,$arquivo);
}

function rp(){
//Alias para a função mostraREQUESTEPara.
    if(!isset($linha) or !isset($arquivo)){
        $backtrace = debug_backtrace();
        $chamada = array_shift($backtrace);
        
        $linha = $chamada['line'];
        //$arquivo = $chamada['file'];
        $arquivo = $_SERVER['PHP_SELF'];
    }

    mostraREQUESTEPara($linha,$arquivo);
}

function s(){
//Alias para a função mostraSESSION.
    if(!isset($linha) or !isset($arquivo)){
        $backtrace = debug_backtrace();
        $chamada = array_shift($backtrace);
        
        $linha = $chamada['line'];
        //$arquivo = $chamada['file'];
        $arquivo = $_SERVER['PHP_SELF'];
    }

    mostraSESSION($linha,$arquivo);
}

function sp(){
//Alias para a função mostraSESSIONEPara.
    if(!isset($linha) or !isset($arquivo)){
        $backtrace = debug_backtrace();
        $chamada = array_shift($backtrace);
        
        $linha = $chamada['line'];
        //$arquivo = $chamada['file'];
        $arquivo = $_SERVER['PHP_SELF'];
    }

    mostraSESSIONEPara($linha,$arquivo);
}

function v(){
//Alias para a função mostraVariaveis.
    if(!isset($linha) or !isset($arquivo)){
        $backtrace = debug_backtrace();
        $chamada = array_shift($backtrace);
        
        $linha = $chamada['line'];
        //$arquivo = $chamada['file'];
        $arquivo = $_SERVER['PHP_SELF'];
    }

    mostraVariaveis($linha,$arquivo);
}

function vp(){
//Alias para a função mostraVariaveisEPara.
    if(!isset($linha) or !isset($arquivo)){
        $backtrace = debug_backtrace();
        $chamada = array_shift($backtrace);
        
        $linha = $chamada['line'];
        //$arquivo = $chamada['file'];
        $arquivo = $_SERVER['PHP_SELF'];
    }

    mostraVariaveisEPara($linha,$arquivo);
}

function vc(){
//Alias para a função mostraVariaveisEConstantes.
    if(!isset($linha) or !isset($arquivo)){
        $backtrace = debug_backtrace();
        $chamada = array_shift($backtrace);
        
        $linha = $chamada['line'];
        //$arquivo = $chamada['file'];
        $arquivo = $_SERVER['PHP_SELF'];
    }

    mostraVariaveisEConstantes($linha,$arquivo);
}

function vcp(){
//Alias para a função mostraVariaveisEConstantesEPara.
    if(!isset($linha) or !isset($arquivo)){
        $backtrace = debug_backtrace();
        $chamada = array_shift($backtrace);
        
        $linha = $chamada['line'];
        //$arquivo = $chamada['file'];
        $arquivo = $_SERVER['PHP_SELF'];
    }

    mostraVariaveisEConstantesEPara($linha,$arquivo);
}

?>