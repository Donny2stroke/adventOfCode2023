<?php
$righeFile = array();
function caricaFile($nomeFile){
    $myfile = fopen(__DIR__ . "/".$nomeFile, "r") or die("Unable to open file!");
    // Output one character until end-of-file
    while(!feof($myfile)) {
        $rigaFile = trim(fgets($myfile));
        array_push($GLOBALS['righeFile'],$rigaFile);
    }
    fclose($myfile);
}
caricaFile("input.txt");

$matrice = array();
foreach($righeFile as $key=>$riga){
    echo $riga.PHP_EOL;
    $valori = str_split($riga);
    foreach($valori as $valore){
        $matrice[$key][]=$valore;
    } 
}

//print_r($matrice);
?>