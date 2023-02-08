<?php
require_once("conn.inc.php");

class ProductoDAO
{



    public function __construct()
    {

    }
    public function getAll()
    { //Método que DEVUELVE un ARRAY con TODOS los Productos de la tabla
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
        try {
            $dbh = new Conn();
            $bd = $dbh->getConn();

            $q = "SELECT * FROM productos";

            $prods = $bd->query($q);
            $prods->setFetchMode(PDO::FETCH_ASSOC);
            $ee = $prods->fetchAll();
            $dbh->close();
            return $ee;
        } catch (PDOException $e) {
            print("Error getAll<br/>");
            exit;
        }
    }
    public function getFiltered($a)
    { //Método que RECIBE un dato con el cod de un Producto y DEVUELVE el producto asociado a ese campo
        try {
            $dbh = new Conn();
            $bd = $dbh->getConn();
            $q = "SELECT * FROM productos WHERE ";
            for ($i = 0; $i < count(NOM); $i++) {
                if (isset($a[$i])) {
                    if ((count(NOM) - 1) != $i && isset($a[$i + 1]))
                        $q .= (is_numeric($a[$i]) != true ? NOM[$i] . " LIKE'$a[$i]%' AND " : NOM[$i] . "<=$a[$i] AND ");
                    else
                        $q .= (is_numeric($a[$i]) != true ? NOM[$i] . " LIKE'$a[$i]%'" : NOM[$i] . "<=$a[$i]");
                }

            }
            //$q="SELECT * FROM productos where cod<=$a[0] AND nom_prod LIKE'$a[1]%' AND pvp<=$a[2] AND prov LIKE '$a[3]%' AND existencias<=$a[4]";

            $prods = $bd->prepare($q);
            $prods->execute();
            $result = $prods->fetchAll(PDO::FETCH_ASSOC);
            $dbh->close();
            return $result;

        } catch (PDOException $e) {
            print("Error get<br/>" . $e->getMessage());
            exit;
        }
    }
    public function getInsert($a)
    {
        try {
            $dbh = new Conn();
            $bd = $dbh->getConn();
            $cod = $this->getMaxCod() + 1;
            $q = "INSERT INTO productos (";
            $cols = "";
            $vals = "";
            //VALUES
            for ($i = 0; $i < count(NOM); $i++) {
                if (isset($a[$i])) {
                    if ((count(NOM) - 1) != $i && isset($a[$i + 1])) {
                        $cols .= NOM[$i] . ",";
                        $vals .= $a[$i] . ",";
                    } else {
                        $cols .= NOM[$i] . ")";
                        $vals .= $a[$i] . ")";
                    }
                }
            }
                $q .= $cols . " VALUES " . $vals;
                //$q="SELECT * FROM productos where cod<=$a[0] AND nom_prod LIKE'$a[1]%' AND pvp<=$a[2] AND prov LIKE '$a[3]%' AND existencias<=$a[4]";
            echo "<h1> $q </h1>";
                
            

        } catch (PDOException $e) {
            print("Error get<br/>" . $e->getMessage());
            exit;
        }
    }
    public function getMaxCod()
    {
        try {
            $dbh = new Conn();
            $bd = $dbh->getConn();
            $q = "SELECT MAX(cod) FROM productos; ";

            $prods = $bd->prepare($q);
            $prods->execute();
            $result = $prods->fetchAll(PDO::FETCH_ASSOC);
            $dbh->close();
            return $result;

        } catch (PDOException $e) {
            print("Error get<br/>" . $e->getMessage());
            exit;
        }
    }
}
?>