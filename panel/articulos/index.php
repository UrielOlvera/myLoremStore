<div class="container" id="main">
    <div class="row" style="display: flex; align-items: center;">
        <div class="col s12 m9 l9">
            <h2>Listado de articulos</h2>
        </div>
        <div class="col m3 l3">
            <a class="cyan darken-4 waves-effect waves-light btn btn-block right" href="?menu=add-article">Add <i class="material-icons right">add</i></a>
        </div>
    </div>
    <div class="row">
        <div class="col s12 m12 l12">
            <table class="highlight responsive-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>UnitPrice</th>
                        <th class="center-alaign">Image</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        require '../vendor/autoload.php';
                        $articulo = new mystore\Articulo;
                        $items = $articulo -> show();
                        $quantity_items = count($items);
                        if($quantity_items > 0) {
                            foreach($items as $row){
                        ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['nameCategory']; ?></td>
                        <td><?php echo $row['unitPrice']; ?></td>
                        <td class="center-alaign">
                            <?php
                            $image = "../assets/img/articleImages/".$row['image'];
                            if(file_exists($image)){
                            ?>
                                <img class="responsive-img" src="<?php echo $image ?>" style="max-width: 100px;">
                            <?php } else {?>
                                <i>NO DISPONIBLE</i>
                            <?php } ?>
                        </td>
                        <td>
                            <a class="waves-effect waves-light btn-small btn-floating red" href="../panel/actions.php?id=<?php echo $row['id']; ?>"><i class="material-icons">delete</i></a>
                        </td>
                        <td>
                            <a class="waves-effect waves-light btn-small btn-floating" href="?menu=update-article&id=<?php echo $row['id']; ?>"><i class="material-icons">edit</i></a>
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