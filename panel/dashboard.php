<div class="container" id="main">
    <h1>Dashboard</h1>
    <div class="row">
        <div class="col s12 m12 l12">
            <table class="highlight responsive-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>customer</th>
                        <th>order</th>
                        <th>total</th>
                        <th>date</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        require '../vendor/autoload.php';
                        $pedido = new mystore\Pedido;
                        $items = $pedido->showLatest();
                        $quantity_items = count($items);
                        if($quantity_items > 0) {
                            $c = 0;
                            foreach($items as $row){
                                $c++;
                        ?>
                    <tr>
                        <td><?php echo $c; ?></td>
                        <td><?php echo $row['firstName'].' '.$row['lastName']; ?></td>
                        <td><?php echo $row['id']; ?></td>
                        <td>$ <?php echo $row['total']; ?> MXN</td>
                        <td><?php echo $row['date']; ?></td>
                        <td>
                            <a class="waves-effect waves-light btn-small btn-floating"
                                href="?menu=see-order&id=<?php echo $row['id']; ?>"><i class="fas fa-eye"></i></a>
                        </td>
                    </tr>
                    <?php
                            } 
                        } else {
                        ?>
                    <tr colspan="7">
                        <td>NO HAY REGISTROS</td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
