<div class="container">
    <?php
    require '../vendor/autoload.php';
    $id = $_GET['id'];
    $order = new mystore\Pedido;

    $orderData = $order->showByID($id);
    $detailsData = $order->showDetailsByID($id);
    ?>
    <div class="row">
        <div class="col s12 m4 l4 card-panel blue-grey darken-3 z-depth-3">
            <div class="card-content">
                <div class="row">
                    <div class="input-filed col s6 m12 l12">
                        <input class="white-text"
                            value="<?php echo $orderData['firstName'].' '.$orderData['lastName']; ?>" type="text"
                            readonly>
                        <label>Name</label>
                    </div>
                    <div class="input-filed col s6 m12 l12">
                        <input class="white-text"
                            value="<?php echo $orderData['date']; ?>" type="text"
                            readonly>
                        <label>Date</label>
                    </div>
                    <div class="input-filed col s12 m12 l12">
                        <input class="white-text"
                            value="<?php echo $orderData['email']; ?>" type="text"
                            readonly>
                        <label>Email</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col s12 m8 l8">
            <table class="highlight responsive-table grey lighten-5">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $quantity_items = count($detailsData);
                        /*print '<pre>';
                        print_r($detailsData);
                        die;*/
                        if($quantity_items > 0) {
                            $c = 0;
                            foreach($detailsData as $row){
                                $subtotal = $row['quantity'] * $row['price'];
                                $c++;
                        ?>
                    <tr>
                        <td><?php echo $c; ?></td>
                        <td><?php echo $row['name']?></td>
                        <td>
                            <?php
                            $image = "../assets/img/articleImages/".$row['image'];
                            if(file_exists($image)){
                            ?>
                            <img class="responsive-img image-table-sm" src="<?php echo $image ?>">
                            <?php } else {?>
                            <i>NO DISPONIBLE</i>
                            <?php } ?>
                        </td>
                        <td><?php echo $row['quantity']; ?></td>
                        <td>$ <?php echo $row['price']; ?> MXN</td>
                        <td>$ <?php echo $subtotal; ?> MXN</td>
                    </tr>
                    <?php
                            } 
                        } else {
                        ?>
                    <tr colspan="6">
                        <td>NO HAY REGISTROS</td>
                    </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr class="teal-text">
                        <td class="right-align bold-text" colspan="5">TOTAL</td>
                        <td>$ <?php echo $orderData['total']; ?> MXN</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col m6 l6">
            <a class="btn left blue-grey darken-3" href="?menu=orders">Back<i class="left fas fa-chevron-left"></i></a>
        </div>
        <div class="col m6 l6">
            <a class="btn right teal" href="#" id="btnPrint">Print<i class="right fas fa-print"></i></a>
        </div>
    </div>
</div>
<script src="../panel/pedidos/see-order.js"></script>