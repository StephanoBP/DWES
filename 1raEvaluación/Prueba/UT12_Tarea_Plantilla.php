<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!--
		Desarrollo Web en Entorno Servidor - Tarea 1 
		Programar una aplicación para mantener una lista de teléfonos en una única página web, programada en PHP.
		La lista almacenará únicamente dos datos: número de teléfono y nombre. No podrá haber números repetidos.
		Se utilizará como modelo de datos un array de pares (teléfono, nombre)
		En la parte superior de la página web se mostrará un título y los resultados obtenidos
		En la parte inferior tendremos un sencillo formulario, una casilla de texto para el teléfono y otra para el nombre.
		Al pulsar el botón, se ejecutará alguna de las siguientes acciones:
				•	Si el número está vacío o no cumple el patrón de validación especificado, se mostrará una advertencia.
				•	Si se dejan ambos campos en blanco, se mostrarán todos los teléfonos con su nombre.
				•	Si se introduce un número válido que no existe en la lista, y el nombre  no está vacío, se añadirá a la lista.
				•	Si se introduce un número válido que existe en la lista y se indica un nombre, se sustituirá el nombre anterior.
				•	Si se introduce un número válido que existe en la lista pero sin nombre, se eliminará el teléfono de la lista
				•	Si se introduce un nombre que exista dejando el teléfono en blanco, se visualizará una lista con todos los teléfonos asociados
		
		Como mecanismo de "persistencia" utilizaremos un array que está en el formulario como elemento oculto y se envía.
		
		Consultar y comprender el funcionamiento de métodos: explode, implode, array_search >> utilizados en el código		
		
-->
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<title>List&iacute;n telef&oacute;nico de Jos&eacute; Luis Comesa&ntilde;a</title>
		<!-- Preparamos el entorno gráfico para los datos -->
		<style type="text/css">
				td, th {border: 1px solid grey; padding: 4px;}
				th {text-align:center; background-color: #67b4b4;}
				table {border: 1px solid black;}
				div {padding: 10px 20px}
				h1 {font-family: sans-serif; font-style: italic; text-transform: capitalize; color: #008000;}
				.bajoDch {float:right; position:absolute; margin-right:0px; margin-bottom:0px; bottom:0px; right:0px;}
				.altoDch1 {color: #00f; float:right; position:absolute; margin-right:0px; margin-top:0px; top:0px; right:0px;}
				.altoDch2 {color: #f00; float:right; position:absolute; margin-right:0px; margin-top:0px; top:0px; right:0px;}
		</style>
	</head>
		
	<body>
		<?php
			//el array con los datos que se pasan por post es $array
			//var_dump($_POST);

			// Comprobamos que se han recibido los datos 'anteriores' por POST
			if (!empty($_POST['personas'])) {
				// Se crea un array con todos los datos antiguos indicándole que están separados por coma
				$array = explode("," , $_POST['personas']);
				// almacenamos en 'count' el número de elementos almacenados
				$count = count($array);
			}else{
				// Si no hay datos antiguos, sólo reiniciamos las variables globales
				$array=array();
				$count=0;
			}
			
			foreach($_POST as $k=>$v){
				echo"$k...$v...<br/>";
			}
			
			if(!empty($_POST['nom'])){//hay nombre
				if(!empty($_POST['tfno'])){//hay telefono
					//telefono existente UPDATE
					$encontrado = findPos($array,$_POST['tfno']);
					if($encontrado===false){
						print("...INSERT<br/>\n");
						$array[$count++]=$_POST['tfno'];
						$array[$count++]=$_POST['nom'];
					}else{
						print("...UPDATE<br/>");
						$array[$encontrado+1] = $_POST['nom'];
					}
				}else{//no hay telefono 
					//listado de telefonos de ese nombre
					foreach ($array as $v) {
						echo"$v<br/>";
					}
					

				}

			}else{//no hay nombre
				if(empty($_POST['tfno'])){//no hay telefono
					//GETALL
					echo"...GETALL<br/>";
					foreach ($array as $v) {
						echo"$v...";
					}						
					echo"<br/>";

				
				}else{//hay telefono DELETE
					print("...DELETE<br/>");

					$encontrado=findPos($array,$_POST['tfno']);
					if($encontrado!==false){
						unset($array[$encontrado++]);
						unset($array[$encontrado]);
					}
				}

			}
			
			// Función para comprobar si un nombre existe en el array
			function findPos($miArray,$dato){
				$posicion=array_search($dato,$miArray,false);
				return $posicion;
			}
		?>
		<!-- Capa inferior derecha para las preguntas -->
		<div class="bajoDch">
			<!-- Formulario para enviar sus datos por POST a la misma página 
				Así tenemos el primer requisito: una SOLA página-->
			<!-- En el action hay un script que redirige a la misma página -->
			<form name="formulario" action="<?php $_SERVER['PHP_SELF']?>" method="post">
				<table style="border: 0px;">
					<tr style="background-color: #8080ff;">Introduzca los datos 
						<!-- Número de teléfono -->
						<td>
							<fieldset>
								<legend>Tel&eacute;fono</legend>
								<input name="tfno" type="text" />
							</fieldset>
						</td>
						<!-- Nombre de la persona -->
						<td>
							<fieldset>
								<legend>Nombre</legend>
								<input name="nom" type="text" />
							</fieldset>
						</td>
					</tr>
				</table>
				<!-- Creamos un campo oculto para enviar los datos ya recogidos con anterioridad -->
				<input name="personas" type="hidden" value="<?php if (isset($array)) echo implode("," , $array) ?>" style="text-align:right;" />
				<!-- Enviamos los datos del formulario -->
				<input type="submit" value="Aceptar" /> 
			</form>
		</div>
	</body>
</html>