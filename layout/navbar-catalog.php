<?php
require '../client-view/actions.php'; 
$q = quantityArticles();
?>
<nav class="blue-grey darken-4" style="margin-bottom: 2em;">
    <div class="container">
        <div class="nav-wrapper">
            <div class="row">
                <a href="../welcome.php" class="brand-logoc left">
                    <img src="https://cdn.worldvectorlogo.com/logos/lorem-lorem-1.svg" height="50px"
                        style="padding-top: 10px;">
                </a>
                <!--<form class="col l6">
                    <div class="input-field">
                        <i class="material-icons prefix">search</i>
                        <input id="search" type="text">
                        <label for="search"></label>
                    </div>
                </form>-->
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="?menu=catalog">Catalog</a></li>
                    <!--<li><a href="?menu=catalog">Catalog</a></li>-->
                    <li>
                        <a href="?menu=cart">Cart
                            <span class="teal darken-4 btn btn-floating white-text">
                            <?php echo $q ?></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<?php require_once('../router/client-view-router.php'); ?>