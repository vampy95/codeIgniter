<?php
    include_once("seguridad.php"); 
    class ControllersLugar extends seguridad{

        public function __construct(){
            parent::__construct();
            $this->load->model('ModelLugares');
            $this->load->model('ModelPeliculas');    
            $this->load->model('ModelLocalizaciones');                   
        }

        public function index(){
            if ($this->comprobarLogin()) {
                $data['viewName'] = 'insertLugar';
                $this->load->view('plantilla', $data);
            }            
        }

        public function insert(){
            if ($this->comprobarLogin()) {
                $nombre = $this->input->get_post("nombre");
                $descripcion = $this->input->get_post("descripcion");
                $longitud = $this->input->get_post("longitud");
                $latitud = $this->input->get_post("latitud");
                $result = $this->ModelLugares->insert($nombre, $descripcion, $longitud, $latitud);
                $data['lugares'] = $this->ModelLugares->get_all_data();
                $data['peliculas'] = $this->ModelPeliculas->get_all_data();
                $data['localizaciones'] = $this->ModelLocalizaciones->get_all_data();
                $data['msg'] = '';
                if($result > 0){
                    $data['msg'] = 'Lugar insertado con exito';
                }else{
                    $data['msg'] = 'Error al insertar un lugar';
                }
                $data['viewName'] = 'usuario';
                $this->load->view('plantilla', $data);
            }              
        }

        public function delete(){
            if ($this->comprobarLogin()) {
                $id = $this->input->get("id");
                $result = $this->ModelLugares->delete($id);
                $data['lugares'] = $this->ModelLugares->get_all_data();
                $data['peliculas'] = $this->ModelPeliculas->get_all_data();
                $data['localizaciones'] = $this->ModelLocalizaciones->get_all_data();
                $data['msg'] = '';
                if($result > 0){
                    $data['msg'] = 'Lugar eliminado con exito';
                }else{
                    $data['msg'] = 'Error al eliminar un lugar';
                }
                $data['viewName'] = 'usuario';
                $this->load->view('plantilla', $data);
            }      
        }

        public function update($id){
            if ($this->comprobarLogin()) {
                $nombre = $this->input->get_post("nombreLugar");
                $descripcion = $this->input->get_post("descripcionLugar");
                $longitud = $this->input->get_post("longitudLugar");
                $latitud = $this->input->get_post("latitudLugar");
                $result = $this->ModelLugares->update($id, $nombre, $descripcion, $longitud, $latitud);
                $data['lugares'] = $this->ModelLugares->get_all_data();
                $data['peliculas'] = $this->ModelPeliculas->get_all_data();
                $data['localizaciones'] = $this->ModelLocalizaciones->get_all_data();
                $data['msg'] = '';
                if($result > 0){
                    $data['msg'] = 'Lugar actualizado correctamente';
                }else{
                    $data['msg'] = 'Error al actualizar un lugar';
                }
                $data['viewName'] = 'usuario';
                $this->load->view('plantilla', $data);
            }                                        
        }

        
    }
?>