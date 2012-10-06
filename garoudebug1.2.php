<?php
/**
Autor: Danilo Ara�jo Silva
�ltima atualiza��o: 05-10-2012
Descri��o: classe para auxiliar na inspe��o, corre��o e debuga��o de c�digos na linguagem PHP.
 T�m o objetivo de ser independente do sistema, funcionando apenas com a inclus�o deste arquivo.
*/

/*

//C�digo para inclus�o no arquivo a ser debugado:
//------------------------------------------------------------
if(file_exists('garoudebug.php')){
  include('garoudebug.php');
}else{
  echo '<br>GarouDebug n�o encontrado.<br>';
  exit;
}
//------------------------------------------------------------
//Opcional:
garou();

*/

function m($texto=null){
//Alias para a fun��o imprimeTextoLegivel.
    $backtrace = debug_backtrace();
    $chamada = array_shift($backtrace);
    
    $linha = $chamada['line'];
    //$arquivo = $chamada['file'];
    $arquivo = $_SERVER['PHP_SELF'];

    imprimeTextoLegivel($texto,$linha,$arquivo);
}

function mp($texto=null){
//Alias para a fun��o imprimeTextoLegivel mas para a execu��o.
    $backtrace = debug_backtrace();
    $chamada = array_shift($backtrace);
    
    $linha = $chamada['line'];
    //$arquivo = $chamada['file'];
    $arquivo = $_SERVER['PHP_SELF'];

    imprimeTextoLegivel($texto,$linha,$arquivo);
    exit;
}

function g(){
//Alias para a fun��o mostraGET.
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
//Confirma se o debugador foi inclu�do corretamente.
    $mensagem='GarouDebug est� funcionando corretamente.';
    imprimeVariavelLegivel($mensagem);
    exit;
}

function gp(){
//Alias para a fun��o mostraGETEPara.
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
//Imprime um texto de forma leg�vel. Se n�o houver texto imprive uma
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
    $backtrace = debug_backtrace();
    $chamada = array_shift($backtrace);
    
    $linha = $chamada['line'];
    //$arquivo = $chamada['file'];
    $arquivo = $_SERVER['PHP_SELF'];
    
    legivel($parametro,$linha,$arquivo);
}

function legivel(&$parametro=null,$linha=null,$arquivo=null){ 
//Se n�o passado nenhum par�metro, imprime o nome do arquivo vigente e o n�mero
//  da linha corrente de forma leg�vel.
// 
//Se passado o nome de uma vari�vel (podendo ser um vetor), imprime o nome do
//  arquivo vigente, o n�mero da linha, o nome da vari�vel e o seu conte�do de
//  leg�veis.
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
//Se n�o passado nenhum par�metro, imprime o nome do arquivo vigente e o n�mero
//  da linha corrente de forma leg�vel. Para a execu��o neste ponto.
// 
//Se passado o nome de uma vari�vel (podendo ser um vetor), imprime o nome do
//  arquivo vigente, o n�mero da linha, o nome da vari�vel e o seu conte�do de
//  leg�veis. Para a execu��o neste ponto.
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
//Alias para a fun��o legivelEPara.

    $backtrace = debug_backtrace();
    $chamada = array_shift($backtrace);
    
    $linha = $chamada['line'];
    //$arquivo = $chamada['file'];
    $arquivo = $_SERVER['PHP_SELF'];
    
    legivelEPara($parametro,$linha,$arquivo);
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

function mostraGET($linha=null,$arquivo=null){
//Mostra os valores da vari�vel GET.
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
//Mostra os valores da vari�vel GET. Para a execu��o.
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
//Mostra os valores da vari�vel POST.
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
//Mostra os valores da vari�vel POST. Para a execu��o.
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
//Mostra os valores da vari�vel REQUEST.
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
//Mostra os valores da vari�vel REQUEST. Para a execu��o.
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
//Mostra os valores das variaveis da sess�o.
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
//Mostra os valores das variaveis da sess�o. Para a execu��o.
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
//Mostra os valores das vari�veis vigentes.
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
//Mostra os valores das vari�veis vigentes. Para a execu��o.
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
//Mostra os valores das vari�veis vigentes.
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
//Mostra os valores das vari�veis vigentes. Para a execu��o.
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
//Alias para a fun��o mostraPOST.
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
//Alias para a fun��o mostraPOSTEPara.
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
//Alias para a fun��o mostraREQUEST.
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
//Alias para a fun��o mostraREQUESTEPara.
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
//Alias para a fun��o mostraSESSION.
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
//Alias para a fun��o mostraSESSIONEPara.
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
//Alias para a fun��o mostraVariaveis.
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
//Alias para a fun��o mostraVariaveisEPara.
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
//Alias para a fun��o mostraVariaveisEConstantes.
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
//Alias para a fun��o mostraVariaveisEConstantesEPara.
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