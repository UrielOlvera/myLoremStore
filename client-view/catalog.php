<div class="container" id="main">
    <div class="row">
        <?php
        require '../vendor/autoload.php';
        $articulo = new mystore\Articulo;
        $items = $articulo -> show();
        $quantity_items = count($items);
        if($quantity_items > 0){
            foreach($items as $row){
        ?>
            <div class="col s6 m4 l3" >
                <div class="card z-depth-3">
                    <div class="card-image" style="height: 13em;">
                        <?php 
                        $image_path =  "../assets/img/articleImages/".$row['image']; 
                        if(file_exists($image_path)){
                        ?>
                            <img class="responsive-img" src="<?php echo $image_path ?>">
                        <?php } else {?>
                            <div class="card-panel">
                                <span><i>NO DISPONIBLE</i></span>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="card-content">
                        <span class="card-title truncate"><?php echo $row['name'] ?></span>
                    </div>
                    <div class="card-action">
                            <a href="?menu=cart&id=<?php echo $row['id'] ?>" class="waves-effect waves-light btn btn-block"><i class="left fas fa-shopping-cart"></i>Buy</a>
                    </div>
                </div>
            </div>
        <?php }} else {?>
            <h4><i>NO EXISTEN REGISTROS</i></h4>
        <?php } ?>
    </div>
</div>