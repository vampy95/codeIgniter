<?php
    class ModelUser extends CI_Model{

        public function comprobarLogin($nombre, $contraseña){
            $resultado = $this->db->query("SELECT nombre, pass FROM usuarios WHERE nombre = '$nombre' AND pass = '$contraseña'");
            return $resultado->num_rows();
        }
        public function comprobar_usuario($usuario){
            $resultado = $this->db->query("SELECT nombre FROM usuarios WHERE nombre = '$usuario'");
            return $resultado->num_rows();
        }
    }
?>