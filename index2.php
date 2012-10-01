    <?php

    $var1='my var 1';

    $array1['1']='first position of my array 1';
    $array1['2']='second position of my array 1';

//     echo name($var1);
// 
//     echo "<br>";
// 
//     echo name($array1);

    function name(&$var, $scope=false, $prefix='unique', $suffix='value'){
        if($scope) $vals = $scope;
        else      $vals = $GLOBALS;
        $old = $var;
        $var = $new = $prefix.rand().$suffix;
        $vname = FALSE;
        foreach($vals as $key => $val) {
          if($val === $new) $vname = $key;
        }
        $var = $old;
        return $vname;
    }
    
    function legivel(&$parametro){
      echo "<br>parametro: ".name($parametro)."<br>";
    }
    
    legivel($var1);
    ?>
