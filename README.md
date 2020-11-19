# myLoremStore
La pagina principal es **welcome.php** donde existen dos enlaces:
* Catalog
* Panel
### Catalog
Es la vista de los clientes donde se encuentra el catalogo de articulos existentes, se pueden añadir al carrito y realizar una compra con tarjeta.
El numero de tarjeta para las pruebas es **4242 4242 4242 4242**, los datos: fecha de expiracion, CVC, y CP pueden ser cuales quiera.
Cuando se realice el pago se vacia el carrito y los datos del cliente (a excepcion de los referentes a la tarjeta) son almacenados en la BD asi como los datos de la orden.

### Panel
Es el apartado del administrador. Al entrar se puede acceder a las ordenes existentes, tambien es posible añadir productos nuevos que estaran disponibles en el catalogo de clientes (tambien pueden ser editados y eliminados).
el usuario y contraseña para loguearse es:
  - user: **admin**
  - pass: **admin**


Si se intenta acceder a un archivo inexistente (que produce error 404) se redireccionara a una pagina _404.php_ donde se encuentra un enlace para ir a _welcome.php_.

El codigo del proyecto puede encontrarse [aqui](https://github.com/UrielOlvera/myLoremStore/).
