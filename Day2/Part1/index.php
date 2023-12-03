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



$maxRedCube = 12;
$maxGreenCube = 13;
$maxBluCube = 14;
$tiroPossibile=0;
foreach($righeFile as $key=>$riga){
    $indice = $key+1;
    $tiri = explode(";", explode(":",$riga)[1]);
    $buono = true;
    foreach($tiri as $tiro){
        $numRed = 0;
        $numGreen = 0;
        $numBlu = 0;
        $boxSeparati = explode(",",$tiro);
        foreach($boxSeparati as $box){
            $numeroEColore = explode(" ",$box);
            if($numeroEColore[2]=="red"){
                $numRed = $numRed + $numeroEColore[1];
            }else if($numeroEColore[2]=="green"){
                $numGreen = $numGreen + $numeroEColore[1];
            }else if($numeroEColore[2]=="blue"){
                $numBlu = $numBlu + $numeroEColore[1];
            }
        }
        if($numRed <= $maxRedCube && $numGreen <= $maxGreenCube && $numBlu <= $maxBluCube && $buono){
            $buono = true;
        }else{
            $buono = false;
        }
    }
    if($buono){
        $tiroPossibile = $tiroPossibile + $indice;
    }
}
echo $tiroPossibile;
?>