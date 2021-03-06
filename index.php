<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Store</title>
    <!-- Import Google Icon Font -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <!-- Materialize CSS -->
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" />-->
    <link rel="stylesheet" href="assets/css/materialize.css">
    <link rel="stylesheet" href="assets/css/pageIndex.css">
    
</head>

<body>
    <div class="container">
        <img src="https://cdn.worldvectorlogo.com/logos/lorem-lorem.svg" style="max-width: 90%; padding: 1em;">
        <div class="card-panel center-align grey lighten-2">
            <div class="card-content">
                <h1>Welcome to <i class="teal-text">MYSTORE</i></h1>
                <p>Entra al catalogo para agregar articulos al carrito y hacer pedidos o entra al panel para (si eres un administrador del sitio) para gestionar los articulos y ver las ordenes hechas por los clientes.</p>
            </div>
            <div class="row">
                <a class="btn waves-effect waves-light left col m3" href="layout/client-view.php?menu=catalog">Catalog</a>
                <a class="btn waves-effect waves-light right col m3" href="panel/login.php">Panel</a>
            </div>
        </div>
    </div>
    <!-- Materialize JavaScript -->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>-->
    <script src="../assets/js/materialize.js"></script>
    <script src="../assets/js/main.js"></script>
    
</body>

</html>