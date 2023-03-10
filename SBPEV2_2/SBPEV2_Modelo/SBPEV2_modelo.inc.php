<?php
require_once("SBPEV2_conn.inc.php");

class Modelo_SBPEV2{
    public function __construct(){}
    public function getUsuarios_SBPEV2($t){
        try{
            $dbh = new Conn();
            $bd=$dbh->getConn();
            $stmt = $bd->query("DESCRIBE $t");
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $dbh->close();
            return $results;
        }catch(PDOException $e){
            print("Error consultar: <br/>".$e->getMessage());
            exit;
        }
    }
    public function comprobarNombre_SBPEV2($t,$usr){
        try{
            $dbh = new Conn();
            $bd=$dbh->getConn();
            $stmt = $bd->query("SELECT usr FROM $t WHERE usr='$usr'");
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $dbh->close();
            return $results;
        }catch(PDOException $e){
            print("Error consultar: <br/>".$e->getMessage());
            exit;
        }
    }
    public function insertarUsuario_SBPEV2($t,$a){
        try {
            $dbh = new Conn();
            $bd = $dbh->getConn();
            $q = "INSERT INTO $t (";
            $cols="";
            $vals="";
            //VALUES
            foreach($a as $k=>$v){
                if($k!="enviar"){
                    $cols .= $k . ",";
                    $vals .="'$v'". ",";
                }
            }
            $cols=substr($cols,0,strlen($cols)-1);
            $vals=substr($vals,0,strlen($vals)-1);
            $q .= $cols.")";
            $q.=" VALUES (" .$vals.")";
            $bd->exec($q);
            $dbh->close();
            return "Usuario registrado";
        } catch (PDOException $e) {
            print("Error get<br/>" . $e->getMessage());
            exit;
        }
    }
    function validar_SBPEV2($datos){
        $mssg = "";
        if ($datos['usr'] == "" or $datos['pass'] == "")
            $mssg = "Es obligatorio introducir datos";
        else {
            try {
                $c = new Conn();
                $bd = $c->getConn();
                //consultamos los usuarios de mysql
                $stmt = $bd->prepare("SELECT * FROM usuarios Where usr=:usr AND pass=:pass");
                $stmt->execute([':usr' => $datos['usr'], ':pass' => $datos['pass']]);
                if ($stmt->rowCount() != 1)$mssg = "ERROR";

            } catch (PDOException $e) {
                echo "<h1>USUARIO Y CONTRASEÑA INCORRECTOS<br></h1>";
            } finally {
                $c->close();
            }
        }
        return $mssg;
    }
    public function getProveedores_SBPEV2($t){
        try {
            $dbh = new Conn();
            $bd = $dbh->getConn();
            $q = "SELECT * FROM $t";
            $prods = $bd->query($q);
            $prods->setFetchMode(PDO::FETCH_ASSOC);
            $res = $prods->fetchAll();
            $dbh->close();
            return $res;
        } catch (PDOException $e) {
            print("Error getAll<br/>");
            exit;
        }
    }
    public function getCifs_SBPEV2($t){
        try{
            $dbh = new Conn();
            $bd=$dbh->getConn();
    
            $stmt = $bd->query("SELECT DISTINCT cif from $t");
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $dbh->close();
            return $res;
        }catch(PDOException $e){
            print("Error consultar: <br/>".$e->getMessage());
            exit;
        } 
    }
    public function getFiltered_SBPEV2($t,$a)
    { //Método que RECIBE un dato con el cod de un Producto y DEVUELVE el producto asociado a ese campo
        try {
            $dbh = new Conn();
            $bd = $dbh->getConn();
            $q = "SELECT * FROM $t WHERE ";
            foreach($a as $k=>$v){
                if($k!="filtros"){
                    $q .= (is_numeric($v) != true ? $k . " LIKE'%$v%' AND " : $k . "=$v AND ");
                }
            }
            $q=substr($q,0,strlen($q)-4);
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