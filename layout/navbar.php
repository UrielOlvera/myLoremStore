
<nav class="blue-grey darken-4" style="margin-bottom: 2em;">
    <div class="container">
        <div class="nav-wrapper">
            <a href="../index.php" class="brand-logo">
                <img src="https://cdn.worldvectorlogo.com/logos/lorem-lorem-1.svg" height="50px"
                    style="padding-top: 10px;">
            </a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="?menu=articles">Articles</a></li>
                <li><a href="?menu=dashboard">Dashboard</a></li>
                <li><a href="?menu=orders">Orders</a></li>
                <li><a href="#" class="dropdown-trigger" data-target='dropdown1'><?php echo $_SESSION['userLogged']['name']; ?><i class="material-icons right">arrow_drop_down</i></a></li>
                <ul id='dropdown1' class='dropdown-content'>
                    <li><a href='?menu=exit'>Exit <i class="material-icons right">exit_to_app</i></a></li>
                    <li><a href="#!">My Profile <i class="material-icons right">person</i></a></li>
                </ul>
            </ul>
        </div>
    </div>
</nav>
<?php require_once('../router/admin-router.php'); ?>

