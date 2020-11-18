<?php
if(!isset($_SESSION['cart']))
    session_start();

if(isset($_GET['id']) && is_numeric($_GET['id'])){
    $id = $_GET['id'];
    require '../vendor/autoload.php';
    $articulo = new mystore\Articulo;
    $article_info = $articulo -> showByID($id);
    if(!$article_info){
        header('Location: ../layout/client-view.php?menu=catalog');
    }
    if(isset($_SESSION['cart'])){                        //Si el carrito existe
        if(array_key_exists($id, $_SESSION['cart'])){    //Si el articulo existe en el carrito
            updateArticle($id);
        } else {
            addArticle($article_info, $id);
        }
    } else {
        addArticle($article_info, $id);
    }
    //unset($_SESSION['cart']);
    //print '<pre>';
    //print_r($_SESSION['cart']);
}
?>
<div class="container">
    <table class="highlight responsive-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th class="center-alaign">Image</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
                $c = 0;
                foreach($_SESSION['cart'] as $index => $value){
                    $c++;
                    $subtotal = $value['unitPrice'] * $value['quantity'];
            ?>
                    <tr>
                        <form action="../client-view/actions.php?edit=true" method="POST">
                            <td><?php echo $c; ?></td>
                            <td><?php echo $value['name'] ?></td>
                            <td class="center-alaign">
                                <?php
                                $image = "../assets/img/articleImages/".$value['image'];
                                if(file_exists($image)){
                                ?>
                                    <img class="responsive-img" src="<?php echo $image ?>" style="max-width: 70px;">
                                <?php } else {?>
                                <i>NO DISPONIBLE</i>
                                <?php } ?>
                            </td>
                            <td>$ <?php echo $value['unitPrice'] ?> MXN</td>
                            <td>
                                <input type="hidden" name="id" value="<?php echo $value['id'] ?>">
                                <input type="text" name="quantity" value="<?php echo $value['quantity'] ?>">
                            </td>
                            <td>$ <?php echo $subtotal ?> MXN</td>
                            <td>
                                <button type="submit" class="waves-effect waves-light btn-small btn-floating"><i class="material-icons">refresh</i></button>
                                <a class="waves-effect waves-light btn-small btn-floating red" href="../client-view/actions.php?delete=true&id=<?php echo $value['id'] ?>"><i class="material-icons ">delete</i></a>
                            </td>
                        </form>
                    </tr>
            <?php }
            } ?>
        </tbody>
        <tfoot>
            <tr class="teal-text">
                <td class="right-align" style="font-weight: bold;" colspan="5">TOTAL:</td>
                <td colspan="2">$ <?php echo makeTotal(); ?> MXN</td>
            </tr>
        </tfoot>
    </table>
    
</div>
<hr style="width: 90%;">
<div class="container">
    <?php
    if(isset($_SESSION['cart']) && empty($_SESSION['cart'])){
    ?>
        <div class="row" style="display: flex; align-items: center;">
            <div class="col s12 m9 l9">
                <h4><i>YOUR CART IS EMPTY</i></h4>
            </div>
            <div class="col m3 l3">
                <a class="waves-effect waves-light btn right teal darken-4" href="?menu=catalog">keep buying</a>
            </div>
        </div>
    <?php } ?>
    <?php
    if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
    ?>
        <div class="row">
            <a class="waves-effect waves-light btn left teal darken-4" href="?menu=catalog">keep buying</a>
            <!-- abrir modal CHECKOUT -->
            <a class="waves-effect waves-light btn right blue-grey lighten-1" href="?menu=complete-info">Go to checkout</a>
        </div>
    <?php } ?>
</div>