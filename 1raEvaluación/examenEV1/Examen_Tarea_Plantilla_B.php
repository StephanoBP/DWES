<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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
						// Comprobamos que se han recibido los datos 'anteriores' por POST
						if (!empty($_POST['personas'])) {
								// Se crea un array con todos los datos antiguos indicándole que están separados por coma
								$array = explode("," , $_POST['personas']);
								// almacenamos en 'pos' el número de elementos almacenados
								$pos = count($array);
						}else{
								// Si no hay datos antiguos, sólo reiniciamos las variables globales
								$array=array();
								$pos=0;
						}
						
						//Implementar la funcionalidad solicitada
						
						// Función para comprobar si un nombre existe en el array
						function findPos($miArray,$dato){
							
								$posicion=array_search($miArray,$dato,false);
								return $posicion;
						}
				?>
				<!-- Capa inferior derecha para las preguntas -->
				<div class="bajoDch">
						<!-- Formulario para enviar sus datos por POST a la misma página -->
						<form name="formulario" action="" method="post">
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
								<input type="submit" value="Aplicar cambios" /> 
						</form>
				</div>
		</body>
</html>