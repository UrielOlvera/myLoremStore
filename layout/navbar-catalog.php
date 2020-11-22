<?php
require '../client-view/actions.php'; 
$q = quantityArticles();
?>
<nav class="blue-grey darken-4">
    <div class="nav-wrapper">
        <div class="row">
            <div class="col s10 m10 l12">
                <a href="../index.php" class="brand-logo left">
                    <img src="https://cdn.worldvectorlogo.com/logos/lorem-lorem-1.svg" height="50px"
                        style="padding-top: 10px;">
                </a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="?menu=catalog">Catalog</a></li>
                    <li>
                        <a href="?menu=cart">Cart
                            <span class="teal darken-4 btn btn-floating white-text">
                                <?php echo $q ?></span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col s2 m2">
                <ul id="slide-out" class="sidenav right">
                    <li><a href="?menu=catalog">Catalog</a></li>
                    <li>
                        <a href="?menu=cart">Cart
                            <span class="teal darken-4 btn btn-floating white-text">
                                <?php echo $q ?></span>
                        </a>
                    </li>
                </ul>
                <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="fas fa-bars"></i></a>
            </div>
        </div>
    </div>
</nav>
<?php require_once('../router/client-view-router.php'); ?>