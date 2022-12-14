
<!DOCTYPE html>
<!-- saved from url=(0035)http://localhost/gesventa/panel.php -->
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>GESTIÓN DE VENTASFORM-/ut3/put3/index.php</title>
    </head>
    <body>
        <h1 align='center'>ASIGNATURAS DE SBP</h1>
        <br>
        <div style="width:100%; height:20%; text-align:center; margin:1%;"><h1>BIENVENIDO a GESVENTAS</h1>
            <?php
                //ej_catalogo.php
                define('BR','</br>\n');
                $HTTP="http://localhost/gesventa/";

                $barraMenu = array(
                    "LOGIN" => "login",
                    "REGISTRARSE" => "registro",
                    "LOGOUT" => "logout",
                    "INICIO" => "index",
                    "CARRITO" => "carrito"
                );
                foreach($barraMenu as $k=>$v){
                    echo "<a href='HTTP$v.php'\n";
                    echo "style='margin: 0% 3%;'>$k</a>\n";
                }
            ?> 
        </div>
        <div style="overflow:hidden; width:100%; height:80%;">
            <div id="tables" style="float:left; width:30%; ">
                <form action="http://localhost/ut3/put3/index.php" method="POST">  <!--target="_blank"--> 	</form>
                <fieldset>
                    <legend>Gestionar: </legend>  
                    <table>
                        <tbody>
                            <?php
                            $gestion=array('clientes','facturas','productos','proveedores','usuarios');
                            $elto="";
                            foreach($gestion as $k=>$v){
                                $elto= "<tr><form action='http://localhost/gesventa/panel.php' method='POST'></form>\n";
                                $elto.= "<td>$v</td>\n";
                                $elto.= "<td><select name='accion'><option value='query'>CONSULTAR</option><option value='insert'>NUEVO REGISTRO</option></select></td>\n";
                                $elto.= "<input type='hidden' name='table' value='clientes'><td><input type='submit' value='IR'></td></tr>\n";
                                echo $elto;
                            }
                            ?>
                        </tbody>
                    </table>
                </fieldset>
                <div>
                    <fieldset>
                        <legend>Filtros: </legend>
                        <strong>productos: query</strong><br>
                        <table>
                            <form action="http://localhost/gesventa/panel.php" method="POST"></form>
                            <tbody>
                                <?php
                                    $filtros = array(
                                        "cod" => "number",
                                        "nom_prod" => "text",
                                        "pvp" => "number",
                                        "prov" => "text",
                                        "imagen" =>"text",
                                        "existencias" => "number"
                                    );
                                    $elto="";
                                    foreach ($filtros as $k=>$v){
                                        $elto.="<tr><td><label for=$k>$k</label></td>\n";
                                        $elto.="<td><input type=$v name='fields[$k]'></td></tr>\n";
                                    }
                                    echo $elto;

                                ?>

                            </tbody>
                        </table>
                        <input type="hidden" name="table" value="productos">
                        <input type="hidden" name="accion" value="query">
                        <br>
                        <input type="submit" value="ENVIAR" style="float:right;">
                    </fieldset>
                </div>
            </div>                                     
            <div id="cuerpo" style="width:70%; float:left;">
                <fieldset>
                    <legend>Resultados: </legend>
                    <h3>RESULTADOS</h3>
                    <br>
                    <table style="border: none; width:100%;">
                        <tbody>
                            <?php
                                $resultados=[
                                    [
                                        "cod"=>"1",
                                        "num"=>"Z323",
                                        "precio"=>"71.90",
                                        "id"=>"J04131348",
                                        "img"=>"auriculares-mp3.jpg"
                                    ],
                                    [
                                        "cod"=>"2",
                                        "num"=>"Z623",
                                        "precio"=>"209.00",
                                        "id"=>"J04131348",
                                        "img"=>"batmanbot.jpeg"
                                    ],
                                    [
                                        "cod"=>"3",
                                        "num"=>"Z906",
                                        "precio"=>"399.00",
                                        "id"=>"J04131348",
                                        "img"=>"cargador.jpg"
                                    ],
                                    [
                                        "cod"=>"4",
                                        "num"=>"Z506",
                                        "precio"=>"125.00",
                                        "id"=>"J04131348",
                                        "img"=>"auriculares-mp3.jpg"
                                    ],
                                    [
                                        "cod"=>"11",
                                        "num"=>"Argon",
                                        "precio"=>"50.00",
                                        "id"=>"D7767763A",
                                        "img"=>"regulador-botella-argon.jpg"
                                    ],
                                    [
                                        "cod"=>"12",
                                        "num"=>"Neon",
                                        "precio"=>"35.00",
                                        "id"=>"D7767763A",
                                        "img"=>"neon.jpg"
                                    ],
                                    [
                                        "cod"=>"13",
                                        "num"=>"Ocelote",
                                        "precio"=>"59.90",
                                        "id"=>"D7767763A",
                                        "img"=>"raton-ocelote-gaming.jpg"
                                    ],
                                    [
                                        "cod"=>"22",
                                        "num"=>"Death Stalker",
                                        "precio"=>"299.99",
                                        "id"=>"P3941094I",
                                        "img"=>"razer-deathstalker-chroma-keyboard.jpg"
                                    ],
                                    [
                                        "cod"=>"23",
                                        "num"=>"Orb Weaver",
                                        "precio"=>"129.99",
                                        "id"=>"P3941094I",
                                        "img"=>"orbweaverchroma.png"
                                    ],
                                    [
                                        "cod"=>"24",
                                        "num"=>"Black Widow",
                                        "precio"=>"149.00",
                                        "id"=>"P3941094I",
                                        "img"=>"envy-phoenix-810-401lns.jpg"
                                    ],
                                    [
                                        "cod"=>"31",
                                        "num"=>"Envy Phoenix 810-401ns",
                                        "precio"=>"2599.00",
                                        "id"=>"A36109494",
                                        "img"=>"envy-phoenix-810-401lns.jpg"
                                    ],
                                    [
                                        "cod"=>"32",
                                        "num"=>"Envy Recline 23-k301ns",
                                        "precio"=>"1399.00",
                                        "id"=>"A36109494",
                                        "img"=>"pavillon-500-354ns.jpg"
                                    ],
                                    [
                                        "cod"=>"33",
                                        "num"=>"Pavilion 500-354ns",
                                        "precio"=>"499.00",
                                        "id"=>"A36109494",
                                        "img"=>"pavillon-500-354ns.jpg"
                                    ]
                                ];
                                $elto="";
                                foreach ($resultados as $datos){
                                    $elto.="<tr style='padding:0 20% 0 0;'>\n<form action='http://localhost/gesventa/panel.php' method='POST'></form>\n";
                                    $elto.="<td style='left:10px;'>".$datos['cod']."</td>\n";
                                    $elto.="<td style='left:10px;'>".$datos['num']."</td>\n";
                                    $elto.="<td style='left:10px;'>".$datos['precio']."</td>\n";
                                    $elto.="<td style='left:10px;'>".$datos['id']."</td>\n";
                                    $elto.="<td style='left:10px;'>".$datos['img']."</td>\n";
                                    $elto.="<td><select name='uds'>\n";
                                    $elto.="<option value='0' selected=''>0</option>\n";
                                    if($datos['cod']==11||$datos['cod']==13||$datos['cod']==23||$datos['cod']==31||$datos['cod']==33){
                                        $elto.="<option value='1'>1</option>\n";
                                        $elto.="<option value='2'>2</option>\n";
                                        $elto.="<option value='3'>3</option>\n";
                                        $elto.="<option value='4'>4</option>\n";
                                        $elto.="<option value='5'>5</option>\n";
                                    }
                                    $elto.="</select></td><td><br><input type='submit' name=".$datos['cod']." value='AÑADIR'></td>\n";
                                    $elto.="<input type='hidden' name='prod' value=''".$datos['cod']."></tr>\n";
                                }
                                echo $elto;
                            ?>
                        </tbody>
                    </table>
                </fieldset>
            </div>
        </div>
    </body>
</html>