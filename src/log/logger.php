<?php

function logger($msg, $tinit, $tfinish){
    $opTime = $tfinish - $tinit;
    $logLine = date("d-m-y\tg:i:s a T\t").round($opTime, 3)." s.\t".$msg."\n";
    $logFile = fopen("../src/log/log.txt", 'a') or die("Error creando archivo");
    fwrite($logFile, $logLine) or die("Error escribiendo en el archivo");
    fclose($logFile);
}
?>