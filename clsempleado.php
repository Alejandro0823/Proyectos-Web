<?php
	class clsempleado{
		//Definir los atributos de la clase
		private $con;
		private $dbhost="localhost";
		private $dbuser="root";
		private $dbpass="";
		private $dbname="nomina";
		function __construct(){
			$this->connect_db();//Invocar el método para conectar a la BD
		}
		public function connect_db(){
			$this->con = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
			if(mysqli_connect_error()){
				die("Conexión a la base de datos falló " . mysqli_connect_error() . mysqli_connect_errno());
			}
		}
		
		public function sanitize($var){
			$return = mysqli_real_escape_string($this->con, $var);
			return $return;
		}
		public function create($DoctIdent,$Apellidos,$Nombres,$FechaIngreso,$Cargo,$Salario){
			$sql = "INSERT INTO empleado (Docident,Apellidos,Nombres,FechaIngreso,Cargo,Salario) VALUES ('$DoctIdent', '$Apellidos', '$Nombres', '$FechaIngreso', '$Cargo','$Salario')";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
		public function read(){
			$sql = "SELECT * FROM empleado";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}

		public function find($busqueda){
			$sql = "SELECT * FROM clientes WHERE id like '$busqueda%' 
				or apellidos like '$busqueda%' or nombres like '$busqueda%'";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}
		
		public function single_record($DocIdent){
			$sql = "SELECT * FROM empleado where DocIdent='$DocIdent'";
			$res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_object($res);
			return $return ;
		}
		public function update($Nombres,$Apellidos,$FechaIngreso,$Cargo ,$Salario, $DocIdent){
			$sql = "UPDATE empleado SET Apellidos='$Apellidos', Nombres='$Nombres', FechaIngreso='$FechaIngreso', Cargo='$Cargo', Salario='$Salario' DocIdent='$DocIdent' WHERE DocIdent=$DocIdent";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
		public function delete($id){
			$sql = "DELETE FROM clientes WHERE id=$id";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
	}
?>	

