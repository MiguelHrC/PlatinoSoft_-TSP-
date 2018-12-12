<?php
	class Tareas {

		private $idTarea;
		private $Tarea;
        private $idUsuario;
		private $Usuario_Tweeter;
        private $Hastag;
        private $Dia_inicio;
        private $Dia_Fin;
        private $Hora_Inicio;
        private $Hora_Fin;

		function __construct(){
			$this -> idTarea = 0;
			$this -> Tarea = null;
            $this -> idUsuario = null;
			$this -> Usuario_Tweeter = null;
            $this -> Hastag= null;
            $this -> Dia_inicio= null;
            $this -> Dia_Fin= null;
            $this -> Hora_Inicio= null;
            $this -> Hora_Fin= null;
		}

		public function setidTarea($idTarea){
			$this -> idTarea = $idTarea;
		}
		public function getidTarea(){
			return $this -> idTarea;
		}
		public function setTarea($Tarea){
			$this -> Tarea = $Tarea;
		}
		public function getTarea(){
			return $this -> Tarea;
		}
        public function setidUsuario($idUsuario){
            $this -> idUsuario = $idUsuario;
		}
        public function getidUsuario(){
            return $this -> idUsuario;
		}
		public function setUsuario_Tweeter($Usuario_Tweeter){
			$this -> Usuario_Tweeter = $Usuario_Tweeter;
		}
		public function getUsuario_Tweeter(){
			return $this -> Usuario_Tweeter;
		}
		public function setHastag($Hastag){
			$this -> Hastag = $Hastag;
		}
		public function getHastag(){
			return $this -> Hastag;
        }        
        public function setDia_inicio($Dia_inicio){
			$this -> Dia_inicio = $Dia_inicio;
        }
		public function getDia_inicio(){
			return $this -> Dia_inicio;
        }
        public function setDia_Fin($Dia_Fin){
			$this -> Dia_Fin = $Dia_Fin;
        }
		public function getDia_Fin(){
			return $this -> Dia_Fin;
        }
        public function setHora_Inicio($Hora_Inicio){
			$this -> Hora_Inicio = $Hora_Inicio;
        }
		public function getHora_Inicio(){
			return $this -> Hora_Inicio;
        }
        public function setHora_Fin($Hora_Fin){
			$this -> Hora_Fin = $Hora_Fin;
        }
		public function getHora_Fin(){
			return $this -> Hora_Fin;
        }
	}
?>