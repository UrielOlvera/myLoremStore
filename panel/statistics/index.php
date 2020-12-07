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
                <li class="tab col s6"><a href="#totalSales">Total Sales</a></li>
                <li class="tab col s6"><a href="#top10">Best selling articles</a></li>
            </ul>
        </div>
        <div id="totalSales"class="col s12 card-panel">
            <h3>Total Sales</h3>
            <div id="totalSalesGraph"></div>
        </div>
    </div>
    
    <?php 
    $data = $pedido->showSales();
    $monto = array();
    $fecha = array();
    foreach($data as $item){
        array_push($monto, $item[0]);
        array_push($fecha, $item[1]);
    }
    $x = json_encode($fecha);
    $y = json_encode($monto);
    
    $data = $articulo->sales();
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
        let X = parseData('<?php echo $x; ?>');
        let Y = parseData('<?php echo $y; ?>');

        let trace1 = {
            x: X,
            y: Y,
            type: 'scatter'
        };
        let data = [trace1];
        Plotly.newPlot('totalSalesGraph', data);
    </script>
</div>