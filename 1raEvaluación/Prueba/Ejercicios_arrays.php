<!DOCTYPE html>
<?php
    //Ejercicio 1
    define("BR","<br>\n");
    $a = array("manzana","naranja");
    $b = array(1 => "manzana", 0 =>"naranja");
    $b = $b + array(2 => "uva", 3 => "mandarina");
    array_push($a,"uva","mandarina");
    var_dump($a);
    print(BR);
    var_dump($b);
    //Ejercicio 2
    $bclaves = array_keys($b);
    print(BR);
    var_dump($bclaves);
    //Ejercicio 3 a
    krsort($bclaves);
    print(BR);
    var_dump($bclaves);
    print(BR);
    //Ejercicio 3 b
    asort($bclaves);
    var_dump($bclaves);
    //Ejercicio 4
    $bvalores = array_values($b);
    print(BR);
    var_dump($bvalores);
    print(BR);
    //Ejercicio 5
    $cad="Desarrollo Web en Entorno Servidor con PHP";
    $cad = explode(" ",$cad);
    var_dump($cad);
    print(BR);
    //Ejercicio 6
    $cad = implode("-",$cad);
    var_dump($cad);
    print(BR);
    //Ejercicio 7
    $cad = str_replace("PHP","JSP",$cad);
    var_dump($cad);
    print(BR);
    //Ejercicio 8
    $credenciales = array(
        'ana' => array('nombre' => 'Ana', 'apellido' => 'García', 'clave' =>
        'a4a97ffc170ec7ab32b85b2129c69c50'),
        'marga' => array('nombre' => 'Margarita', 'apellido' => 'Ayuso', 'clave' =>
        '35559e8b5732fbd5029bef54aeab7a21'),
        'pepe' => array('nombre' => 'Jose', 'apellido' => 'González', 'clave' =>
        '10dea63031376352d413a8e530654b8b'),
        'luis' => array('nombre' => 'Luis', 'apellido' => 'Merino', 'clave' =>
        'C707dce7b5a990e349c873268cf5a968') 
    );
    $clave2=md5("clave2");
    //$key = array_search($clave2 , array_column($credenciales,'clave'));
    foreach($credenciales as $key){
        if($clave2 == $key['clave']){
            print("Nombre: ".$key['nombre'].", Apellido: ".$key['apellido']);
        }
    }
    $indicesServer = array('PHP_SELF',
        'argv',
        'argc',
        'GATEWAY_INTERFACE',
        'SERVER_ADDR',
        'SERVER_NAME',
        'SERVER_SOFTWARE',
        'SERVER_PROTOCOL',
        'REQUEST_METHOD',
        'REQUEST_TIME',
        'REQUEST_TIME_FLOAT',
        'QUERY_STRING',
        'DOCUMENT_ROOT',
        'HTTP_ACCEPT',
        'HTTP_ACCEPT_CHARSET',
        'HTTP_ACCEPT_ENCODING',
        'HTTP_ACCEPT_LANGUAGE',
        'HTTP_CONNECTION',
        'HTTP_HOST',
        'HTTP_REFERER',
        'HTTP_USER_AGENT',
        'HTTPS',
        'REMOTE_ADDR',
        'REMOTE_HOST',
        'REMOTE_PORT',
        'REMOTE_USER',
        'REDIRECT_REMOTE_USER',
        'SCRIPT_FILENAME',
        'SERVER_ADMIN',
        'SERVER_PORT',
        'SERVER_SIGNATURE',
        'PATH_TRANSLATED',
        'SCRIPT_NAME',
        'REQUEST_URI',
        'PHP_AUTH_DIGEST',
        'PHP_AUTH_USER',
        'PHP_AUTH_PW',
        'AUTH_TYPE',
        'PATH_INFO',
        'ORIG_PATH_INFO') ; 
    //var_dump(array_values($indicesServer));
    print(BR);
    foreach ($indicesServer as $value){
        print($value."-");
    }
    asort($indicesServer);
    print(BR);
    print(in_array("HTTP_USER_AGENT",$indicesServer));
?>
