<nav class="blue-grey darken-4">
    <div class="nav-wrapper">
        <div class="row">
            <div class="col s10 m10 l12">
                <a href="../index.php" class="brand-logo left">
                    <img src="https://cdn.worldvectorlogo.com/logos/lorem-lorem-1.svg" height="50px"
                        style="padding-top: 10px;">
                </a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="?menu=log">LOG</a></li>
                    <li><a href="?menu=statistics">Statistics</a></li>
                    <li><a href="?menu=articles">Articles</a></li>
                    <li><a href="?menu=orders">Orders</a></li>
                    <li><a href="#" class="dropdown-trigger"
                            data-target='dropdown1'><?php echo $_SESSION['userLogged']['name']; ?><i class="right fas fa-sort-down"></i></a></li>
                    <ul id='dropdown1' class='dropdown-content'>
                        <li><a href='?menu=exit'>Exit <i class="fas fa-sign-out-alt"></i></a></li>
                        <!--<li><a href="#!">My Profile <i class="material-icons right">person</i></a></li>-->
                    </ul>
                </ul>

            </div>
            <div class="col s2 m2">
                <ul id="slide-out" class="sidenav right">
                    <ul class='collapsible'>
                        <li>
                            <div class="collapsible-header"><?php echo $_SESSION['userLogged']['name']; ?></div>
                            <div class="collapsible-body"><a class="teal-text" href='?menu=exit'>Exit</a><i class="fas fa-sign-out-alt"></i></div>
                        </li>
                        <!--<li><a href="#!">My Profile <i class="material-icons right">person</i></a></li>-->
                    </ul>
                    <li></li>
                    <li><a href="?menu=log">LOG</a></li>
                    <li><a href="?menu=statistics">Statistics</a></li>
                    <li><a href="?menu=articles">Articles</a></li>
                    <li><a href="?menu=orders">Orders</a></li>
                </ul>
                <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="fas fa-bars"></i></a>
            </div>
        </div>
    </div>
</nav>
