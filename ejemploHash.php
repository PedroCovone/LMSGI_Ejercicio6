<?php

    $ejemplo = "esto es un ejemplo";
    echo "$ejemplo | " ;
    $ejemploHash = hash('sha256', $ejemplo);
    echo $ejemploHash;

    /************************************************************/

    $ejemplo = "esto es un ejemplo";
    $hashAlmacenado= "3f129df29c5d855d8553e0b7f1c416ca7e18f76d468bc02671aae20f42516667";
    $hashCalculado = hash('sha256', $ejemplo);

    if($hashAlmacenado == $hashCalculado){
        echo 'los dos son iguales';
    } else{
        echo 'los dos son distintos';
    }

?>