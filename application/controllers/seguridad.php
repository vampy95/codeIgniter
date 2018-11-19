<?php
    class seguridad extends CI_Controller {
        public function confirmarLogin($usuario) {
            // Guardamos el id del usuario en una variable de sesión
            $data_session = array('usuario' => $usuario); //guardamos el id del usuario en un array
            $this->session->set_userdata($data_session); //guardamos el array como una variable de session global
        }
        public function comprobarLogin() {
            // Devuelve true si hay un usuario logueado o false en otro caso
            if (isset($this->session->usuario)){
                return true;
            }else{
                //Si el usuario no esta logueado se redirecciona a la view de login
                $data['viewName'] = 'login';
                $this->load->view('plantilla', $data); 
            }
        }
    }
?>
