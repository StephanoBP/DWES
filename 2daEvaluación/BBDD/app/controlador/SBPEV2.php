<!--sufijo de funciones SBP
Se desea crear una página de registro de usuarios para la tabla de la base de datos gesventa.

Se pide escribir una aplicación con una sola página de control, app.php, siguiendo el patrón MVC para desarrollo de páginas dinámicas.

La aplicación debe funcionar con la siguiente lógica:

Al abrirse por primera vez, aparecerá un formulario generado dinámicamente, con todos los campos de la tabla usuarios, 
que permita registrar un nuevo usuario aunque la tabla se modifique en el futuro. (5 puntos) YA
Al pulsar el botón del formulario de registro, ocurrirá lo siguiente: 
Si existe un usuario registrado con ese nombre, mostrará un mensaje de notificación que incluya el nombre registrado. (5 puntos) YA
Si el usuario no está registrado, lo insertará directamente en la tabla con todos sus datos (5 puntos), con las siguientes condiciones
Una vez registrado el usuario, aparecerá un mensaje de usuario registrado (1 punto), y un formulario de login. (3 puntos) YA
Al pulsar el botón del formulario de login, se validarán el usuario y la contraseña. (5 puntos) Si el usuario es válido:
Se mostrará una página list,php con:
un listado con los datos de todos los proveedores en la parte derecha (5 puntos)
un formulario para filtrar proveedores en la parte izquierda. El campo cif se mostrará como una lista de opciones con todos los cifs disponibles, y los demás campos como entradas de texto. (10 puntos)
Al pulsar el botón del formulario de filtrado, se visualizarán los clientes que cumplan los criterios especificados (10 puntos)
En los campos de texto, se buscarán cadenas que contengan el texto introducido
En los campos numéricos, se buscarán números con coincidencia exacta
Todos el código entregado, etc., debe estar escrito en php y además

los formularios, listados o cualquier vista deben estar generados dinámicamente
se debe mantener una separación adecuada entre las vistas, el acceso al modelo de datos y el control de la lógica.
Se penalizará el código o funcionalidades no solicitados.

app.php
list.php
los archivos adicionales que se hayan incluido para generación de vistas, acceso a la base de datos, etc.
-->