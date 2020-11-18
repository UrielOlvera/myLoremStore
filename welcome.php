<?php include_once("layout/header.php") ?>
<style>
body{
    background: #009688 ;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #607d8b , #009688 );  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #607d8b , #009688 ); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
}
</style>
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
<?php include_once("layout/footer.php") ?>