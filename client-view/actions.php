<?php
require '../vendor/autoload.php';


if(!isset($_SESSION['cart']))
    session_start();
$articulo = new mystore\Articulo;
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['edit'])){
    //print '<pre>';
    //print_r($_POST);
    //die();
    if($_GET['edit']==='true'){
        $id = $_POST['id'];
        $quantity = $_POST['quantity'];
        if(is_numeric($quantity)){
            if(array_key_exists($id, $_SESSION['cart'])){
                updateArticle($id, $quantity);
            }
        }
        header('Location: ../layout/client-view.php?menu=cart');
    }
}
if(isset($_GET['delete'])){
    if($_GET['delete'] === 'true'){
        if(!isset($_GET['id']) OR !is_numeric($_GET['id']))
            header('Location: ../layout/client-view.php?menu=cart');
    
        if(isset($_SESSION['cart'])){
            unset($_SESSION['cart'][$_GET['id']]);
            header('Location: ../layout/client-view.php?menu=cart');
        } else {
            header('Location: ../layout/client-view.php?menu=catalog');
        }
    }
}

/*if(!empty($_POST)){
    print '<pre>';
    print_r($_POST);
}*/


function addArticle($article_info, $id, $quantity = 1){
    $_SESSION['cart'][$id] = array(
        'id' => $article_info['id'],
        'name' => $article_info['name'],
        'image' => $article_info['image'],
        'unitPrice' => $article_info['unitPrice'],
        'quantity' => $quantity
    );
}
function updateArticle($id, $quantity = false){
    if($quantity){
        $_SESSION['cart'][$id]['quantity'] = $quantity;
    } else {
        $_SESSION['cart'][$id]['quantity']+=1;
    }
}
function makeTotal(){
    $total = 0;
    if(isset($_SESSION['cart'])){
        foreach($_SESSION['cart'] as $index => $value){
            $total += $value['unitPrice'] * $value['quantity'];
        }
    }
    return $total;
}
function quantityArticles(){
    $quantity = 0;
    if(isset($_SESSION['cart'])){
        foreach($_SESSION['cart'] as $index){
            $quantity ++;
        }
    }
    return $quantity;
}
?>

