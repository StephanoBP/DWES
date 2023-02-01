<?php
require_once("conn.inc.php");

class ProductoDAO{



public function __construct(){

}
public function getAll(){ //Método que DEVUELVE un ARRAY con TODOS los Productos de la tabla
        // try {
            
        //     $dbd = new Conn();
        //     $conn = $dbd->getConn();

        //     //ejecutar consulta NO PREPARADA
        //     $q = "Select * FROM productos";
        //     $prods=$conn->query($q);


        //     $dbd->close();
        // }catch(PDOException $e){
        //     echo "<h1>ERROR</h1>";
        // }
        // return $prods;
            try{
                $dbh = new Conn();
                $bd=$dbh->getConn();
    
                $q="SELECT * FROM productos";
    
                $prods=$bd->query($q);
                $prods->setFetchMode(PDO::FETCH_ASSOC);
                $ee=$prods->fetchAll();
                $dbh->close();
                return $ee;
            }catch(PDOException $e){
                print("Error getAll<br/>");
                exit;
            }
}
public function get($i){//Método que RECIBE un dato con el cod de un Producto y DEVUELVE el producto asociado a ese campo
    
}
public function consultar(){
    try{
        $dbh = new Conn();
        $bd=$dbh->getConn();

        $stmt = $bd->query("DESCRIBE productos");

        $prods=$bd->query($stmt);
        $ee=$prods->fetchAll(PDO::FETCH_ASSOC);
        $dbh->close();
        return $ee;
    }catch(PDOException $e){
        print("Error getAll<br/>");
        exit;
    }
}
}
?>