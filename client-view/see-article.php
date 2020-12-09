<?php
if(isset($_GET['id']) && is_numeric($_GET['id'])){
    $id = $_GET['id'];
    require '../vendor/autoload.php';
    $articulo = new mystore\Articulo;
    $article_info = $articulo -> showByID($id);
    if(!$article_info){
        header('Location: ../layout/client-view.php?menu=catalog');
    }
}
//var_dump($article_info);
?>
<div class="container">
    <div class="row">
        <div class="col m2"></div>
        <div class="col m8">
            <div class="card-panel z-depth-3">
                <div class="row">
                    <div class="col m12">
                        <h3><?php echo $article_info['name'] ?></h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col m6">
                        <?php
                        $image = "../assets/img/articleImages/".$article_info['image'];
                        if(file_exists($image)){
                        ?>
                            <img class="responsive-img" src="<?php echo $image ?>" style="max-width: 50%;">
                        <?php } else {?>
                            <i>NO DISPONIBLE</i>
                        <?php } ?>
                    </div>
                    <div class="col m6">
                        <p><?php echo $article_info['description'] ?></p>
                        <h5>$<?php echo $article_info['unitPrice'] ?></h5>
                        <?php
                        if($article_info['existences']>0){
                        ?>
                            <p class="teal-text"><i>AVAILABLE</i></p>
                        <?php } else { ?>
                            <p class="red-text red darken-4"><i>OUT OF STOCK</i></p>
                        <?php } ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col m6">
                        <a class="waves-effect waves-light btn btn-block left blue-grey darken-3" href="?menu=catalog">back<i class="left fas fa-chevron-left"></i></a>
                    </div>
                    <div class="col m6">
                        <a href="?menu=cart&id=<?php echo $article_info['id'] ?>" class="waves-effect waves-light btn btn-block"><i class="left fas fa-shopping-cart"></i>Buy</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col m2"></div>
    </div>
</div>