<?php
	
	class MySQLConector{

		private $servidor;
		private $usuario;
		private $password;
		private $bd;
		private $conexion;

		function __construct(){
			$this->servidor = "localhost";
			$this->usuario = "root";
			$this->password = "";
			$this->bd = "tweetmonitor";
		}

		public function Conectar(){
			$this->conexion = mysqli_connect($this->servidor,
				$this->usuario,
				$this->password,
				$this->bd);			
		}

		public function Consulta($sqlConsulta){
			$resultado = mysqli_query($this->conexion, $sqlConsulta);
			if (!$resultado) {
				echo "ERROR EN LA CONSULTA " .
				mysql_error();
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