<?php
//agregar validaciones
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name = $_POST['name'];
    $pass = $_POST['pass'];
    require '../vendor/autoload.php';
    $usuario = new mystore\Usuario;
    $userExist = $usuario->login($name, $pass);
    if($userExist){
        session_start();
        $_SESSION['userLogged'] = array(
            'name' => $userExist['name'],
            'status' => 1
        );
        header('Location: ../layout/admin-session-started.php?menu=statistics');
    } else {
        exit(json_encode((array(
            'status' => false,
            'message' => 'Login Error'
        ))));
    }
}
?>