<div class="container" id="main">
    <div class="row">
        <?php
        require '../vendor/autoload.php';
        $articulo = new mystore\Articulo;
        $items = $articulo -> show();
        $quantity_items = count($items);
        if($quantity_items > 0){
            foreach($items as $row){
                if($row['existences'] > $row['reorder']){
        ?>
                    <div class="col s12 m4 l3">
                        <div class="card">
                            <div class="card-image waves-effect waves-block waves-light img-catalog">
                                    <?php 
                                    $image_path =  "../assets/img/articleImages/".$row['image']; 
                                    if(file_exists($image_path)){
                                    ?>
                                        <img class="activator img-responsive" src="<?php echo $image_path ?>">
                                    <?php } else {?>
                                        <span><i>NO DISPONIBLE</i></span>
                                    <?php } ?>
                            </div>
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4 truncate"><?php echo $row['name'] ?></span>
                                <a href="?menu=cart&id=<?php echo $row['id'] ?>" class="waves-effect waves-light btn btn-block"><i class="left fas fa-shopping-cart"></i>Buy</a>
                            </div>
                            <div class="card-reveal">
                                <p class="card-title grey-text text-darken-4 truncate" style="font: bold;"><i class="right fas fa-times"></i><?php echo $row['name'] ?></p>
                                <p><?php echo $row['description'] ?></p>
                                <h5>$<?php echo $row['unitPrice'] ?></h5>
                                <?php
                                if($row['existences']>0){
                                ?>
                                    <p class="teal-text"><i>AVAILABLE</i></p>
                                <?php } else { ?>
                                    <p class="red-text red darken-4"><i>OUT OF STOCK</i></p>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
        <?php }}
            } else {
        ?>
            <h4><i>NO EXISTEN REGISTROS</i></h4>
        <?php } ?>
    </div>
</div>