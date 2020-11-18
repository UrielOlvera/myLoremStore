<?php 

switch ($_GET['menu']) {
    case 'about':
        require_once('about.php');
        break;
    case 'articles':
        require_once('../panel/articulos/index.php');
        break;
    case 'dashboard':
        require_once('../panel/dashboard.php');
        break;
    case 'add-article':
        require_once('../panel/articulos/add-article.php');
        break;
    case 'update-article':
        require_once('../panel/articulos/update-article.php');
        break;
    case 'see-order':
        require_once('../panel/pedidos/see-order.php');
        break;
    case 'orders':
        require_once('../panel/pedidos/index.php');
        break;
    case 'exit':
        header('Location: ../panel/login.php');
        $_SESSION['userLogged'] = array();
        die();
        break;
    default:
        header('Location: ../404.php');
}
?>