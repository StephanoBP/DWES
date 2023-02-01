<?php
require_once("conn.inc.php");

class Modelo{
    public function Modelo(){}
    
    function validar($datos){
        $mssg = "";
        if ($datos['user'] == "" or $datos['pass'] == "")
            $mssg = "Es obligatorio introducir datos";
        else {
            try {
                $c = new Conn();
                $bd = $c->getConn();
                //consultamos los usuarios de mysql
                $stmt = $bd->prepare("SELECT * FROM usuarios Where usr=:usr AND pass=:pass");
                $stmt->execute([':usr' => $datos['user'], ':pass' => md5($datos['pass'])]);

                if ($stmt->rowCount() != 1)$mssg = "ERROR";

            } catch (PDOException $e) {
                echo "<h1>USUARIO Y CONTRASEÑA INCORRECTOS<br></h1>";
            } finally {
                $c->close();
            }
        }
        return $mssg;
    }
    public function getRol($user){
        if ($user === "ana")
            return "admin";
        else
            return "user";
    }
}