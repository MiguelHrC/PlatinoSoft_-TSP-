<?php
	
	class MySQLConector{

		private $servidor;
		private $usuario;
		private $password;
		private $bd;
		private $conexion;

		function __construct(){
			// $this->servidor = "sql5c75f.carrierzone.com";
			// $this->usuario = "simapargco723098";
			// $this->password = "losplatinos18";
			// $this->bd = "platinosoft_simapargco723098";

			$this->servidor = "localhost";
			$this->usuario = "root";
			$this->password = "";
			$this->bd = "tweetmonitor";
		}

		public function Conectar(){
			if( ! $this->conexion = mysqli_connect($this->servidor, $this->usuario, $this->password, $this->bd)) {
    			die('No connection: ' . mysqli_connect_error());
			}
			
		}

		public function Consulta($sqlConsulta){
			$resultado = mysqli_query($this->conexion, $sqlConsulta);
			if (!$resultado) {
				echo "ERROR EN LA CONSULTA: ".mysql_error()." .";
				exit();
			}
			return $resultado; 
		}
		public function CerrarConexion(){
			mysqli_close($this->conexion);
			$this->conexion = null;
		}

		public function UltimoID(){
			return mysqli_insert_id($this->conexion);
		}
		
	}
?>