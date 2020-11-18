<?php
//require '../vendor/autoload.php';
\Stripe\Stripe::setApiKey("sk_test_51HoeWWGg5riqZ4QH22hPGuwHH44LOqHg4xBFydMyqS3UJm50HGqB9ocuGAguA2MHv2QdJtQGhBrPtgROflKSkaIJ00qRr5cz2n");
$token = $_POST["stripeToken"];
$charge = \Stripe\Charge::create([
    'amount' => 2000,                //monto del cargo (minimo 10.00 mxn -> 1000)
    'currency' => "mxn",
    'description' => "lorem ipsum 2",
    'source' => $token
]);
echo '<pre>', print_r($charge), '</pre>';
?>
