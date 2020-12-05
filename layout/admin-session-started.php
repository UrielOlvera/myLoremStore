<?php include_once("header.php") ?>
<!-- JQUERY -->
<?php 
session_start();
if(!isset($_SESSION['userLogged']) OR empty($_SESSION['userLogged'])){
    header('Location: ../panel/login.php');
}
?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<?php include_once("navbar.php") ?>
<?php require_once('../router/admin-router.php'); ?>

<?php include_once("footer.php") ?>