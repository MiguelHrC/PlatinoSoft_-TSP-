<?php
	class MySQLConector{

		private $Servidor;
		private $Usuario;
		private $password;
		private $BD;
		private $Conexion;

		function __construct(){
			/*
			$this->Servidor = "sql5c75f.carrierzone.com";
			$this->Usuario = "simapargco723098";
			$this->password = "losplatinos18";
			$this->BD = "platinosoft_simapargco723098";*/

			 $this->Servidor = "localhost";
			 $this->Usuario = "root";
			 $this->password = "";
			 $this->BD = "tweetmonitor";
		}

		public function Conectar(){
			if( ! $this->Conexion = mysqli_connect($this->Servidor, $this->Usuario, $this->password, $this->BD)) {
    			die('No connection: ' . mysqli_connect_error());
			}
		}

		public function Consulta($sqlConsulta){
			$resultado = mysqli_query($this->Conexion, $sqlConsulta);
			if (!$resultado) {
				echo "ERROR EN LA CONSULTA: ".mysqli_error()." .";
				echo "CONSULTA: ".$sqlConsulta;
				exit();
			}
			return $resultado; 
		}
		public function CerrarConexion(){
			mysqli_close($this->Conexion);
			$this->Conexion = null;
		}

		public function UltimoID(){
			return mysqli_insert_id($this->Conexion);
		}
	}
?>