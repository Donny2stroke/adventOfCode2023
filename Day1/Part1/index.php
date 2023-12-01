<?php
$righeFile = array();
function caricaFile($nomeFile){
    $myfile = fopen(__DIR__ . "/".$nomeFile, "r") or die("Unable to open file!");
    // Output one character until end-of-file
    while(!feof($myfile)) {
        $rigaFile = fgets($myfile);
        array_push($GLOBALS['righeFile'],$rigaFile);
    }
    fclose($myfile);
}
caricaFile("input.txt");


$somma = 0;
foreach($righeFile as $riga){
    $arrayNumeri = array();
    preg_match_all('/[0-9]/', $riga, $arrayNumeri); 

    $primoValore = $arrayNumeri[0][0];
    $ultimoValore = $arrayNumeri[0][count($arrayNumeri[0])-1];
    $valore = ($primoValore*10)+$ultimoValore;
    $somma = $somma + $valore;



    echo $riga;
    echo "Primo Valore: ".$primoValore.PHP_EOL;
    echo "Ultimo Valore: ".$ultimoValore.PHP_EOL;
    echo "Unico numero: ".$valore.PHP_EOL;
    echo "Somma: ".$somma.PHP_EOL;

    //echo $valore.PHP_EOL;

    /* print_r($arrayNumeri);
    echo PHP_EOL;
    echo "Primo Valore: ".$primoValore.PHP_EOL;
    echo "Ultimo Valore: ".$ultimoValore.PHP_EOL; */

    //die();
}

echo $somma;







?>