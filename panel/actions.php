<?php
require '../vendor/autoload.php';

$articulo = new mystore\Articulo;
if(!isset($_SESSION['msgLog']))
    session_start();

if($_SERVER['REQUEST_METHOD']==='GET'){
    $id = $_GET['id'];

    $rpt = $articulo -> delete($id);
    if($rpt){
        header('Location: ../layout/admin-session-started.php?menu=articles');
    }else{
        echo 'Error al eliminar un articulo';
    }
}

if($_SERVER['REQUEST_METHOD']==='POST'){
    //ADD
    if($_POST['action']==='Add'){
        if(empty($_POST['name']))
            exit('Completar Nombre');

        if(empty($_POST['description']))
            exit('Completar Descripcion');

        if(empty($_POST['price']))
            exit('Completar Precio');
        
        if(!is_numeric($_POST['price']))
            exit('Entrada invalida');

        if(empty($_POST['category_id']))
            exit('Seleccionar Categoria');

        if(!is_numeric($_POST['category_id']))
            exit('Seleccionar Categoria valida');

        if(!is_numeric($_POST['existences']))
            exit('Entrada invalida');

        $_params = array(
            'name' => $_POST['name'],
            'description' => $_POST['description'],
            'image' => uploadImage(),
            'unitPrice' => $_POST['price'],
            'category' => $_POST['category_id'],
            'existences' => $_POST['existences']
        );
        $rpt = $articulo -> add($_params);
        if($rpt){
            
            header('Location: ../layout/admin-session-started.php?menu=articles');
        }else{
            echo 'Error al registrar un articulo';
        }
    }
    //UPDATE
    if($_POST['action']==='Update'){
        if(empty($_POST['name']))
            exit('Completar Nombre');

        if(empty($_POST['description']))
            exit('Completar Descripcion');

        if(empty($_POST['price']))
            exit('Completar Precio');
        
        if(!is_numeric($_POST['price']))
            exit('Entrada invalida');

        if(empty($_POST['category_id']))
            exit('Seleccionar Categoria');

        if(!is_numeric($_POST['category_id']))
            exit('Seleccionar Categoria valida');

        if(!is_numeric($_POST['existences']))
            exit('Entrada invalida');
            
        $_params = array(
            'name' => $_POST['name'],
            'description' => $_POST['description'],
            'unitPrice' => $_POST['price'],
            'category' => $_POST['category_id'],
            'id' => $_POST['id'],
            'existences' => $_POST['existences']
        );

        if(!empty($_POST['image_temp']))
            $_params['image'] = $_POST['image_temp']; 
        
        if(!empty($_FILES['image']))
            $_params['image'] = uploadImage();
            
        $rpt = $articulo -> update($_params);
        if($rpt){
            header('Location: ../layout/admin-session-started.php?menu=articles');
        }else{
            echo 'Error al actualizar un articulo';
        }
    }
}

function uploadImage(){
    $path = __DIR__.'/../assets/img/articleImages/';
    $imageFile = $path.$_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], $imageFile);
    return $_FILES['image']['name'];
}
?>