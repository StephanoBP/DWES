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
    function validar($datos){
        $mssg = "";
        if ($datos['usr'] == "" or $datos['pass'] == "")
            $mssg = "Es obligatorio introducir datos";
        else {
            try {
                $c = new Conn();
                $bd = $c->getConn();
                //consultamos los usuarios de mysql
                $stmt = $bd->prepare("SELECT * FROM usuarios Where usr=:usr AND pass=:pass");
                $stmt->execute([':usr' => $datos['user'], ':pass' => $datos['pass']]);

                if ($stmt->rowCount() != 1)$mssg = "ERROR";

            } catch (PDOException $e) {
                echo "<h1>USUARIO Y CONTRASEÑA INCORRECTOS<br></h1>";
            } finally {
                $c->close();
            }
        }
        return $mssg;
    }
}