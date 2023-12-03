<?php
$righeFile = array();
function caricaFile($nomeFile){
    $myfile = fopen(__DIR__ . "/".$nomeFile, "r") or die("Unable to open file!");
    // Output one character until end-of-file
    while(!feof($myfile)) {
        $rigaFile = trim(fgets($myfile));
        $rigaFile = rtrim ($rigaFile, PHP_EOL);
        //$rigaFile = rtrim(fgets($myfile), "\r\n");
        //echo $rigaFile.PHP_EOL;
        array_push($GLOBALS['righeFile'],$rigaFile);
    }
    fclose($myfile);
}
caricaFile("input.txt");

//die();


$somma = 0;
$wordMap = [
    'one' => 1,
    'two' => 2,
    'three' => 3,
    'four' => 4,
    'five' => 5,
    'six' => 6,
    'seven' => 7,
    'eight' => 8,
    'nine' => 9,
];
foreach($righeFile as $KeyAll=>$riga){
    $arrayNumeri = array();
    $pattern = '/(?:' . implode('|', array_keys($wordMap)) . '|[0-9])/';

    if(preg_match_all($pattern, $riga, $matches)){
        foreach($matches[0] as $key=>$val){
            if(in_array($val, array_keys($wordMap))){
                $arrayNumeri[$key][]=$wordMap[$val];
            }else{
                $arrayNumeri[$key][]=$val;
            }
        }
    }
    $primoValore = intval($arrayNumeri[0][0]);
    $ultimoValore = intval($arrayNumeri[count($arrayNumeri)-1][0]);
    $valore = ($primoValore*10)+$ultimoValore;
    $somma = $somma + intval($valore);

    echo "Riga: ".$riga.PHP_EOL;
    echo "Primo valore: ".$primoValore.PHP_EOL;
    echo "Ultimo valore: ".$ultimoValore.PHP_EOL;
    echo "Valore: ".$valore.PHP_EOL;
    echo "Somma: ".$somma.PHP_EOL;
    echo "Key: ".$KeyAll.PHP_EOL;
    echo PHP_EOL;

}

echo $somma;







?>