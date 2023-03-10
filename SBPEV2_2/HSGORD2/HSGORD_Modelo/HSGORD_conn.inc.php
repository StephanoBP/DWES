<?php
class Conn_HSGORD{
	
	//'mysql:dbname=empresa; host=localhost; charset=utf8'
	private $host= "localhost"; 		
	private $db= "gesventa";
	private $chrst= "utf8";
	private $user= "root";
	private $pwd= "root";
	private static $conn; //objeto PDO que vamos a devolver
	
	function getConn_HSGORD(){
		
		$conn_str= 'mysql:dbname='.$this->db;
		$conn_str.='; host='.$this->host;
		$conn_str.='; charset='.$this->chrst;
		//echo $conn_str;
	try{
			
		Conn_HSGORD::$conn= new PDO(
				$conn_str, $this->user, $this->pwd);
		
			//ahora, podemos configurar otros aspectos
			//del objeto PDO
			
		Conn_HSGORD::$conn->setAttribute(
				PDO::ATTR_ERRMODE,
				PDO::ERRMODE_EXCEPTION
		);
				
	}catch (PDOException $e){
		
		die("<br/>ERROR: ".$e->getMessage());
	}

	return Conn_HSGORD::$conn;	
}//getConn

function close_HSGORD(){
	Conn_HSGORD::$conn= null;
}	

}//class