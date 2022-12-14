<?php
//ses_6_login.php
/* Crear un script PHP que tenga un FORM que:
		
		solicite el login y password de un usuario 
		llame a la misma página PHP 
		Cuando se pulse el botón de enviar
		se verificará si se han introducido el nombre y la contraseña 
			En caso afirmativo,
				almacenará el login (no la password), color e idioma en una variable de sesión			
				abrirá la página hola.php
			En caso contrario, abrirá la página hola.php (sin variables de sesión)
		
		La página hola.php comprobará si hay algo en la sesión
			Si hay sesión:
			dará la bienvenida al usuario mostrando su nombre
			pondrá sus preferencias de idioma y color
			Si no hay sesión
			mostrará un mensaje indicando que no puede visitar la página. 
			Tendrá un hipervínculo al formulario inicial.
*/

session_start();

function validar($datos){ //datos será un array
	
	$mssg= ""; //mensaje de validación
	
	if($datos['user']=="")
		$mssg= "Es obligatorio introducir un nombre de usuario";
	if($datos['pass']=="")
		$mssg= "Es obligatorio introducir una contraseña";
	
	return $mssg;
	
}//validar

//var_dump($_POST);
if(isset($_POST['enviar'])){ //se ha pulsado el botón alguna vez
	
	$error= validar($_POST);
	
	//Si hay datos, $mensaje="" y pasamos a poner las variables de sesión
	
	if($error == ""){ //if (empty($error))
		
		$_SESSION['user']= $_POST['user'];
		$_SESSION['lang']= $_POST['lang'];
		$_SESSION['color']= $_POST['color'];	
		
	}
	
	//redirigir
		header('Location: hola.php'); //PETICIÓN GET
}//if isset

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <h3> Formulario de entrada </h3>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
            <label>Usuario: </label>
            <input type="text" name="user" value=""/><br/>
            <label>Contraseña: </label>
            <input type="password" name="pass" value=""/><br/>
            <label>Lenguaje: (EN, ES, FR) </label>
            <input type="text" name="lang" value=""/><br/>
            <label> Color (B, R, Y): </label>
            <input type="text" name="color" value=""/><br/>
            <input type="submit" name="enviar" value="ENVIAR"/>
        </form>
        <?php
        ?>
    </body>
</html>