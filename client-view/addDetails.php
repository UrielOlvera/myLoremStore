<?php
//print '<pre>';
//print_r($_POST);
//die();
session_start();
if($_SERVER['REQUEST_METHOD']==='POST'){
    require 'actions.php';
    require '../vendor/autoload.php';

    if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
        $customer = new mystore\Cliente;
        $order = new mystore\Pedido;
        $article = new mystore\Articulo;
        //agregar cliente
        $_params = array(
            'firstName' => $_POST['firstName'],
            'lastName' => $_POST['lastName'],
            'email' => $_POST['email'],
            'phone' => $_POST['phone'],
            'comentary' => $_POST['comentary']
        );
        $descripcion = $_params['comentary'];
        $customer_id = $customer->add($_params);
        //agregar orden
        $_params = array(
            'customer' => $customer_id,
            'total' => makeTotal(),
            'date' => date('Y-m-d')
        );
        $monto = $_params['total'] * 100;
        $fecha = $_params['date'];
        $order_id = $order->add($_params);
        //order -> status: pedido
        //agregar detalles de la orden
        foreach($_SESSION['cart'] as $index => $value){
            $_params = array(
                'order_id' => $order_id,
                'article_id' => $value['id'],
                'price' => $value['unitPrice'],
                'quantity' => $value['quantity']
            );
            $order->addDetails($_params);
            $article->updateSales($_params['article_id'], $_params['quantity']);
        }
        \Stripe\Stripe::setApiKey("sk_test_51HoeWWGg5riqZ4QH22hPGuwHH44LOqHg4xBFydMyqS3UJm50HGqB9ocuGAguA2MHv2QdJtQGhBrPtgROflKSkaIJ00qRr5cz2n");
        $token = $_POST["stripeToken"];
        $charge = \Stripe\Charge::create([
            'amount' => $monto,                //monto del cargo (minimo 10.00 mxn -> 1000)
            'currency' => "mxn",
            //'date' => $fecha,
            'description' => $descripcion,
            'source' => $token
        ]);
        $_SESSION['cart'] = array();
        header('Location: ../layout/client-view.php?menu=cart');
    }
}
?>