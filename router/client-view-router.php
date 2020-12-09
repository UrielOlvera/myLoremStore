<?php 
switch ($_GET['menu']) {
    case 'catalog':
        require_once('../client-view/catalog.php');
        break;
    case 'cart':
        require_once('../client-view/cart.php');
        break;
    case 'checkout':
        require_once('../client-view/checkout.php');
        break;
    case 'complete-info':
        require_once('../client-view/complete-info.php');
        break;
    case 'see-article':
        require_once('../client-view/see-article.php');
        break;
    default:
        header('Location: ../404.php');
}
?>