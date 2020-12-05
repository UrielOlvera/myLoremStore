<?php
require '../vendor/autoload.php';
if(isset($_GET['id']) || is_numeric($_GET['id'])){
    $id = $_GET['id'];
    $articulo = new mystore\Articulo;
    $article_info = $articulo -> showByID($id);
    if(!$article_info){
        header('Location: ../layout/admin-session-started.php?menu=articles');
    }
    //print '<pre>';
    //print_r($article_info);
    //die();
} else {
    header('Location: ../layout/admin-session-started.php?menu=articles');
}

?>
<div class="container" id="main">
    <div class="row">
        <div class="col m2"></div>
        <div class="col s12 m8">
            <div class="card blue-grey darken-3 z-depth-3">
                <form action="../panel/actions.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $article_info['id'] ?>">
                    <div class="card-content white-text">
                        <div class="card-title center-align">
                            <h4>Update Article</h4>
                        </div>
                        <div class="row">
                            <div class="col s12 m12 l12">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input value="<?php echo $article_info['name'] ?>" id="name" name="name" type="text" class="white-text validate" required>
                                        <label for="name">Name</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <textarea class="white-text materialize-textarea validate" name="description"
                                            id="description" cols="30" rows="10" required><?php echo $article_info['description'] ?></textarea>
                                        <label for="description">Description</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input value="<?php echo $article_info['unitPrice'] ?>" id="price" name="price" type="text" class="white-text validate" placeholder="$"
                                            required>
                                        <label for="price">Price</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <select name="category_id" required>
                                            <option value="" disabled selected>Choose your option</option>
                                            <?php
                                            require '../vendor/autoload.php';
                                            $categoria = new mystore\Categoria;
                                            $category_items = $categoria -> show();
                                            foreach($category_items as $category_row){
                                            ?>
                                                <option value="<?php echo $category_row['id'] ?>" <?php echo $article_info['category'] == $category_row['id'] ?'selected':'' ?>><?php echo $category_row['name'] ?></option>
                                            <?php } ?>
                                        </select>
                                        <label>Category</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="file-field input-field col s12">
                                        <div class="btn teal accent-1 text-dark">
                                            <span>Image</span>
                                            <input type="file" id="imagebtn" name="imagebtn">
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input type="text" class="file-path validate" name="image" placeholder="Upload an image">
                                            <input type="hidden" name="image_temp" value="<?php echo $article_info['image'] ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <div class="row">
                            <div class="input-field col s6">
                                <a class="blue-grey ligthen-3 waves-effect waves-light btn btn-block"
                                    href="?menu=articles">Cancel</a>
                            </div>
                            <div class="input-field col s6">
                                <a class="white-text waves-effect waves-light btn btn-block right teal">
                                    <input name="action" value="Update" type="submit">
                                    <i class="right fas fa-paper-plane"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col m2"></div>
    </div>
</div>