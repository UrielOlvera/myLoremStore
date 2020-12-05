<div class="log-panel">
    <div class="log-content">
        <?php
        $logFile = fopen("../src/log/log.txt", 'r') or die("Error abriendo archivo");
        $data = file_get_contents("../src/log/log.txt");
        $arr = explode("\n", $data);
        foreach(array_reverse($arr) as $it){
            echo sprintf("<p>%s</p>", $it);
        }
        fclose($logFile);
        ?>
    </div>
</div>