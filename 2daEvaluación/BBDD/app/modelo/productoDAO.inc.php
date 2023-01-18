<?php
require_once("conn.inc.php");

class ProductoDAO{



public function __construct(){

}
public function getAll(){ //Método que DEVUELVE un ARRAY con TODOS los Productos de la tabla
        try {
            
            $dbd = new Conn();
            $conn = $dbd->getConn();

            //ejecutar consulta NO PREPARADA
            $q = "Select * FROM productos";
            $prods=$db->query($sql);


            $dbd->close()
        }catch(PDOException $e){
            echo "<h1>ERROR</h1>";
        }
        return $prods;
}
public function get($i){//Método que RECIBE un dato con el cod de un Producto y DEVUELVE el producto asociado a ese campo
    
}

}
?>