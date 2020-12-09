<?php 
require '../vendor/autoload.php';

$articulo = new mystore\Articulo;
$pedido = new mystore\Pedido;

?>

<div class="container">
    <h1>Statistics</h1>
    <hr>
    <div class="row">
        <div class="col s12">
            <ul class="tabs">
                <li class="tab teal-text col s6"><a href="#totalSales">Total Sales</a></li>
                <li class="tab col s6"><a href="#top">Best selling articles</a></li>
            </ul>
        </div>
        <div id="totalSales" class="col s12 card-panel">
            <h3>Total Sales</h3>
            <div id="totalSalesGraph"></div>
        </div>
        <div id="top" class="col s12 card-panel">
            <h3>Best selling articles</h3>
            <div id="topGraph"></div>
        </div>
    </div>
    
    <?php 
    $data1 = $pedido->showSales();
    $monto = array();
    $fecha = array();
    foreach($data1 as $item){
        array_push($monto, $item[0]);
        array_push($fecha, $item[1]);
    }
    $x1 = json_encode($fecha);
    $y1 = json_encode($monto);
    ?>
    <script>
        const parseData = (json) => {
            let parsed = JSON.parse(json);
            let arr = [];
            for(let it in parsed){
                arr.push(parsed[it]);
            }
            return arr;
        }
        let X1 = parseData('<?php echo $x1; ?>');
        let Y1 = parseData('<?php echo $y1; ?>');

        let trace1 = {
            x: X1,
            y: Y1,
            type: 'scatter'
        };
        let data1 = [trace1];
        Plotly.newPlot('totalSalesGraph', data1);
        
    </script>
    <?php
    $data2 = $articulo->topSales();
    $name = array();
    $sold = array();
    foreach($data2 as $item){
        array_push($name, $item[0]);
        array_push($sold, $item[1]);
    }
    $x2 = json_encode($name);
    $y2 = json_encode($sold);
    ?>
    <script>
        let X2 = parseData('<?php echo $x2; ?>');
        let Y2 = parseData('<?php echo $y2; ?>');

        let trace2 = {
            x: X2,
            y: Y2,
            type: 'bar'
        };
        let data2 = [trace2];
        Plotly.newPlot('topGraph', data2);
    </script>
</div>