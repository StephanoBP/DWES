<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
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
            print("<h1 align='center'>ASIGNATURAS DE SBP</h1>");
            if (!empty($_POST['lista'])) {
                    $array = explode("," , $_POST['lista']);
                    $contador = count($array);
            }else{
                    $array=array();
                    $contador=0;
            }
			foreach($_POST as $k=>$v){
                if($k=="nombre")print("<b>$k: $v</b><br/>\n");
                else print("$k: $v<br/>\n");
            }

			if(!empty($_POST['nombre'])){//hay nombre
				if(!empty($_POST['asignatura'])){//hay asignatura
					$busqueda = findPos($array,$_POST['asignatura']);
					if($busqueda===false){
						$array[$contador++]=$_POST['nombre'];
						$array[$contador++]=$_POST['asignatura'];
					}else{
						$array[$busqueda-1] = $_POST['nombre'];
					}
				}else{//no hay asignatura  y listado de asignaturas de ese nombre
                    echo "<b>Lista de asignaturas asociadas a $_POST[nombre]: </b>";
                    for($i=0;$i<sizeof($array);$i++){
                        if($array[$i]==$_POST['nombre']){
                            print($array[$i+1]);
                            print(" ");
                        }
                    }
				}

			}else{
                    if(empty($_POST['asignatura'])){//no hay asignatura
                        print("NO HAY DATOS");
                    }else{//hay asignatura 
                        $busqueda=findPos($array,$_POST['asignatura']);
                        if($busqueda!==false){
                            unset($array[$busqueda--]);
                            unset($array[$busqueda]);
                        }
                    }
    
            }
            function findPos($miArray,$dato){
				$posicion=array_search($dato,$miArray,false);
				return $posicion;
			}
        ?>
        <!-- Capa inferior derecha para las preguntas -->
        <div class="bajoDch">
            <!-- Formulario para enviar sus datos por POST a la misma página -->
            <form name="formulario" action="" method="post">
                <table style="border: 0px;">
                    <tr style="background-color: #8080ff;">Introduzca los datos 
                        <!-- Asignatura de la persona -->
                        <td>
                            <fieldset>
                                <legend>Nombre</legend>
                                <input name="nombre" type="text"/>
                            </fieldset>
                        </td>
                        <!-- Nombre de la persona -->
                        <td>
                            <fieldset>
                                <legend>Asignatura</legend>
                                <input name="asignatura" type="text"/>
                            </fieldset>
                        </td>
                    </tr>
                </table>
                <!-- Creamos un campo oculto para enviar los datos ya recogidos con anterioridad -->
				<input name="lista" type="hidden" value="<?php if (isset($array)) echo implode("," , $array) ?>" style="text-align:right;" />
				<!-- Enviamos los datos del formulario -->
				<input type="submit" value="Aplicar cambios" /> 
			</form>
		</div>
    </body>
</html>