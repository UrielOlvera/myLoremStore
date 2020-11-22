<?php include_once("../layout/header.php") ?>
<?php include_once("../layout/navbar-login.php") ?>
<?php //ssession_start(); print_r($_SESSION['userLogged']); ?>
<div class="container">
    <div class="row">
        <div class="col m2 l2"></div>
        <div class="col m8 l8">
            <div class="card blue-grey darken-3 z-depth-3">
                <form action="login-validate.php" method="POST">
                    <div class="card-image blue-grey lighten-5">
                        <img class="logo-long" src="https://cdn.worldvectorlogo.com/logos/lorem-lorem.svg" />
                    </div>
                    <div class="card-content white-text center-align">
                        <h4>Acceso al Panel</h4>
                        <div class="row section">
                            <div class="col s12 m12 l12 input-filed">
                                <input class="white-text validate" type="text" name="name" id="name" required>
                                <label for="name">User</label>
                            </div>
                            <div class="col s12 m12 l12 input-filed">
                                <input class="white-text validate" type="password" name="pass" id="pass" required>
                                <label for="pass">Password</label>
                            </div>
                        </div>
                        <div class="row section">
                            <div class="col s12 m12 l12">
                                <button class="waves-effect waves-light btn btn-block" type="submit"><i class="right fas fa-paper-plane"></i>Login</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col m2 l2"></div>
    </div>
</div>
<?php include_once("../layout/footer.php") ?>