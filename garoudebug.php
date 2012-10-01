<?php
/**
Autor: Danilo Ara�jo Silva
�ltima atualiza��o: 28-09-2012
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

function vetorLegivel($parametro,$usarEcho=null) {
//Escreve na tela o valor do vetor passado como par�metro de forma leg�vel e bem formatada.
    
    $retorno  = "<br>";
    $retorno .= "<pre>";
    $retorno .= "\n";
    $retorno .= print_r($parametro);
    $retorno .= "\n";
    $retorno .= "</pre>";
    $retorno .= "<br>";
    
    if($usarEcho===true){
        echo $retorno;
    }else{
        return $retorno;
    }
}

function variavelLegivel($parametro,$usarEcho=null,$texto=null){
//Escreve na tela o valor da vari�vel passada como par�metro de forma leg�vel e bem formatada.
    $retorno  = "<br>";
    $retorno .= "\n";
    
    $retorno .= $texto;
    
    $retorno .= "\n";
    $retorno .= "<br>";
    $retorno .= "<pre>";
    
    $retorno .= $parametro;
    
    $retorno .= "</pre>";
    $retorno .= "<br>";
    $retorno .= "\n";
    
    
    if($usarEcho===true){
        echo $retorno;
    }else{
        return $retorno;
    }
}

function mostrarVariaveis(){
//Mostra o valor de todas as vari�veis vigentes.
    $retorno=legivel(get_defined_vars());
    echo $retorno;
}

function mostrarVariaveisLegivel(){
//Mostra o valor de todas as vari�veis vigentes de forma leg�vel.
    $retorno=vetorLegivel(get_defined_vars());
}

function habilitarErros(){
//Habilita os erros do Apache e do PHP.
}

function desabilitarErros(){
//Desabilita os erros do Apache e do PHP.
}

function legivel($parametro,$texto=null){
//Escreve na tela o valor do par�metro passado de forma leg�vel e bem formatada. Pode ser um vetor ou n�o.
    if(is_array($parametro)){
        $retorno  = "<br>";
        $retorno .= "\n";
        
        $retorno .= $texto;
        
        $retorno .= "\n";
        $retorno .= "<br>";
        $retorno .= "<pre>";
        $retorno .= "\n";
        echo $retorno;
        
        $retorno .= print_r($parametro);
        
        $retorno  = '';
        $retorno .= "\n";
        $retorno .= "</pre>";
        $retorno .= "<br>";
        echo $retorno;
    }else{
        $retorno=variavelLegivel($parametro,null,$texto);
        echo $retorno;
    }
}

function usuarioCorrente(){
//Mostra o usu�rio corrente.
    $usuario=get_current_user();
    $retorno=legivel($usuario);
    echo $retorno;
}

function diretorioCorrente(){
//Mostra o diret�rio corrente.
    $diretorio=getcwd();
    $retorno=legivel($diretorio);
    echo $retorno;
}

function garou(){
//Confirma se o debugador foi inclu�do corretamente.
    $mensagem='GarouDebug est� funcionando corretamente.';
    echo legivel($mensagem);
}

function parar(){
//Permite executar uma fun��o e depois parar a execu��o do c�digo.

}

// function legivelPara($parametro){
// //Escreve de forma leg�vel e bem formatado o par�metro e depois
// //  para a execu��o do c�digo.
//     //legivel($parametro,nomeVariavel($parametro));
//     echo nomeVariavel($parametro);
//     exit;
// }

function nomeVariavel(&$var, $scope=false, $prefix='unique', $suffix='value'){
//Retorna o nome da vari�vel passada.
//Necess�rio entender o c�digo e vert�-lo para o portugu�s e melhorar os nomes.
    if($scope) $vals = $scope;
    else      $vals = $GLOBALS;
    $old = $var;
    $var = $new = $prefix.rand().$suffix;
    $vname = FALSE;
    foreach($vals as $key => $val) {
      if($val === $new) $vname = $key;
    }
    $var = $old;
    //return $vname;
}

function lp(&$var, $scope=false, $prefix='unique', $suffix='value'){
//Retorna o nome da vari�vel passada, o seu conte�do de forma leg�vel e
//  para a execu��o.
//Necess�rio entender o c�digo, vert�-lo para o portugu�s e melhorar os nomes.
    if($scope) $vals = $scope;
    else      $vals = $GLOBALS;
    $old = $var;
    $var = $new = $prefix.rand().$suffix;
    $vname = FALSE;
    foreach($vals as $key => $val) {
      if($val === $new) $vname = $key;
    }
    $var = $old;
    //return $vname;
    legivel($var,$vname);
    exit;
}

function l(&$var, $scope=false, $prefix='unique', $suffix='value'){
//Retorna o nome da vari�vel passada e o seu conte�do de forma leg�vel.
//Necess�rio entender o c�digo, vert�-lo para o portugu�s e melhorar os nomes.
    if($scope) $vals = $scope;
    else      $vals = $GLOBALS;
    $old = $var;
    $var = $new = $prefix.rand().$suffix;
    $vname = FALSE;
    foreach($vals as $key => $val) {
      if($val === $new) $vname = $key;
    }
    $var = $old;
    //return $vname;
    legivel($var,$vname);
}


// function l($parametro){
// // Apelido para a fun��o legivelPara.
//     legivelPara($parametro);
// }

// Necess�rio refazer este c�digo.
// function nomeVariavel(&$variavel, $escopo=false, $prefixo='unique', $sufixo='value'){
//   if($escopo)
//     $valores = $escopo;
//   else
//     $valores = $GLOBALS;
//   
//   $antigo = $variavel;
//   $variavel = $novo = $prefixo.rand().$sufixo;
//   $nomeVariavel = FALSE;
//   foreach($valores as $chave => $valor) {
//     if($valor === $novo) $nomeVariavel = $chave;
//   }
//   $variavel = $antigo;
//   return $nomeVariavel;
// }

// function var_name (&$iVar, &$aDefinedVars)
//     {
//     foreach ($aDefinedVars as $k=>$v)
//         $aDefinedVars_0[$k] = $v;
//  
//     $iVarSave = $iVar;
//     $iVar     =!$iVar;
//  
//     $aDiffKeys = array_keys (array_diff_assoc ($aDefinedVars_0, $aDefinedVars));
//     $iVar      = $iVarSave;
//  
//     return $aDiffKeys[0];
//     }

// function nomeVariavel($variavel){
//     foreach($GLOBALS as $nomeVariavel => $valor) {
//         if ($valor === $variavel) {
//             return $nomeVariavel;
//         }
//     }
//     return false;
// }

// function getVarName($name) {
//         return str_replace('$','',$name);
// }

// function vname(&$var, $scope=0)
// {
//     $old = $var;
//     if (($key = array_search($var = 'unique'.rand().'value', !$scope ? $GLOBALS : $scope)) && $var = $old) return $key;  
// }


?>