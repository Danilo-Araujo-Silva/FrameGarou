<?php
/**
Autor: Danilo Araújo Silva
Última atualização: 28-09-2012
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

function vetorLegivel($parametro,$usarEcho=null) {
//Escreve na tela o valor do vetor passado como parâmetro de forma legível e bem formatada.
    
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
//Escreve na tela o valor da variável passada como parâmetro de forma legível e bem formatada.
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
//Mostra o valor de todas as variáveis vigentes.
    $retorno=legivel(get_defined_vars());
    echo $retorno;
}

function mostrarVariaveisLegivel(){
//Mostra o valor de todas as variáveis vigentes de forma legível.
    $retorno=vetorLegivel(get_defined_vars());
}

function habilitarErros(){
//Habilita os erros do Apache e do PHP.
}

function desabilitarErros(){
//Desabilita os erros do Apache e do PHP.
}

function legivel($parametro,$texto=null){
//Escreve na tela o valor do parâmetro passado de forma legível e bem formatada. Pode ser um vetor ou não.
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
//Mostra o usuário corrente.
    $usuario=get_current_user();
    $retorno=legivel($usuario);
    echo $retorno;
}

function diretorioCorrente(){
//Mostra o diretório corrente.
    $diretorio=getcwd();
    $retorno=legivel($diretorio);
    echo $retorno;
}

function garou(){
//Confirma se o debugador foi incluído corretamente.
    $mensagem='GarouDebug está funcionando corretamente.';
    echo legivel($mensagem);
}

function parar(){
//Permite executar uma função e depois parar a execução do código.

}

// function legivelPara($parametro){
// //Escreve de forma legível e bem formatado o parâmetro e depois
// //  para a execução do código.
//     //legivel($parametro,nomeVariavel($parametro));
//     echo nomeVariavel($parametro);
//     exit;
// }

function nomeVariavel(&$var, $scope=false, $prefix='unique', $suffix='value'){
//Retorna o nome da variável passada.
//Necessário entender o código e vertê-lo para o português e melhorar os nomes.
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
//Retorna o nome da variável passada, o seu conteúdo de forma legível e
//  para a execução.
//Necessário entender o código, vertê-lo para o português e melhorar os nomes.
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
//Retorna o nome da variável passada e o seu conteúdo de forma legível.
//Necessário entender o código, vertê-lo para o português e melhorar os nomes.
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
// // Apelido para a função legivelPara.
//     legivelPara($parametro);
// }

// Necessário refazer este código.
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