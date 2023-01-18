<?php
/*
    Clase que sigue el patron DAO
        1. Conecta con una BD relacional
        2. Implementa métodos CRUD: getALL, get(key), save(object), update(object), delete(object)
        3. Puede, además, incluir métodos adicionales para comunicarse con la BD
    Su FUNCIÓN es DESACOPLAR la conexión entre la app y la BD. De esa forma, si en algún momento queremos
    cambiar el método de persistencia (acceso a datos) de la app, bastará con:
        1. Cambiar la conexión
        2. Implementar estos mismo métodos con la nueva conexión al repositorio de datos
*/
    require_once("conn.inc.php");
    class mySQLDAO{
        public function __construct(){
            
        }
        public function getAllTables(){ //Método que DEVUELVE un array con el nombre de TODAS las tablas de mi BD

        }
        public function getAllFields($table){ //Método que RECIBE un nombre de tabla DEVUELVE un ARRAY con el nombre de cada campo de la tabla
            
        }
        public function execStmt($query){ //Método que RECIBE una sentencia SQL SIN PARÁMETROS, la ejecuta (no preparada) y DEVUELVE el resultado de la ejecución

        }
        
    }
?>