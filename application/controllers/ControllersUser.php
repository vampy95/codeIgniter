<?php 
    include_once("seguridad.php");
    class ControllersUser extends seguridad{

        public function __construct(){
            parent::__construct();
            $this->load->model('ModelUser');
            $this->load->model('ModelLugares');
            $this->load->model('ModelPeliculas');
            $this->load->model('ModelLocalizaciones');               
        }

        public function index(){
            $data['viewName'] = 'login';
            $this->load->view('plantilla', $data);            
        }

        public function comprobarLogin(){
            $usuario = $this->input->get("usuario");
            $contraseña = $this->input->get("contraseña");
            $respuesta = $this->ModelUser->comprobarLogin($usuario, $contraseña);
            $data['lugares'] = $this->ModelLugares->get_all_data();
            $data['peliculas'] = $this->ModelPeliculas->get_all_data();
            $data['localizaciones'] = $this->ModelLocalizaciones->get_all_data();
            $data['msg'] = "";
            if ($respuesta == 1) {
                //echo confirmarLogin($id);
                $this->confirmarLogin($usuario);
                $data['viewName'] = 'usuario';
                $this->load->view('plantilla', $data); 
            }else{
                $data['viewName'] = 'login';
                $this->load->view('plantilla', $data);               
            }

        }

        /**************************************************/
        /*              FUNCIONES DE AJAX                */
        /************************************************/

        //Si el resultado es mayor que 1 el usuario existe
        public function comprobar_usuario($usuario){
            $respuesta = $this->ModelUser->comprobar_usuario($usuario);
            echo "$respuesta";
        }
        public function eliminar_fila($id){
            $respuesta = $this->ModelLugar->delete($id);
            echo "$respuesta";            
        }
    }
?>