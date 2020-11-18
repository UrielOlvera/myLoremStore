<?php include_once("../layout/header.php") ?>
<?php include_once("../layout/navbar-login.php") ?>
<?php //ssession_start(); print_r($_SESSION['userLogged']); ?>
<div class="container" style="display: flex; justify-content: center;">
    <div class="card blue-grey darken-1 z-depth-3" style="width: 60%;">
        <form action="login-validate.php" method="POST">
            <div class="card-image blue-grey lighten-5">
                <img src="https://cdn.worldvectorlogo.com/logos/lorem-lorem.svg" height="200px" style="padding: 1em;" />
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
                        <button class="waves-effect waves-light btn" type="submit" style="width: 100%;" ><i class="material-icons right">send</i>Login</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php include_once("../layout/footer.php") ?>