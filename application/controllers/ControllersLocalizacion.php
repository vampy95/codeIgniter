<?php
    include_once("seguridad.php"); 
    class ControllersLocalizacion extends seguridad{

        public function __construct(){
            parent::__construct();
            $this->load->model('ModelLugares');
            $this->load->model('ModelPeliculas');    
            $this->load->model('ModelLocalizaciones');                   
        }

        public function index(){
            if ($this->comprobarLogin()) {            
                $data['viewName'] = 'insertLocalizacion';
                $this->load->view('plantilla', $data);
            }         
        }

        public function insert(){
            if ($this->comprobarLogin()) {
                $descripcion = $this->input->get_post("descripcionLocalizacion");
                $fotografia = $this->input->get_post("fotografiaLocalizacion");
                $id_lugar = $this->input->get_post("id_lugar");
                $id_pelicula = $this->input->get_post("id_pelicula");
                $result = $this->ModelLocalizaciones->insert($descripcion, $fotografia, $id_lugar, $id_pelicula);
                $data['lugares'] = $this->ModelLugares->get_all_data();
                $data['peliculas'] = $this->ModelPeliculas->get_all_data();
                $data['localizaciones'] = $this->ModelLocalizaciones->get_all_data();
                $data['msg'] = '';
                if($result > 0){
                    $data['msg'] = 'Localizacion insertado con exito';
                }else{
                    $data['msg'] = 'Error al insertar una localizacion';
                }
                $data['viewName'] = 'usuario';
                $this->load->view('plantilla', $data);             
            }
        }

        public function delete(){
            if ($this->comprobarLogin()) {
                $id = $this->input->get("id");
                $result = $this->ModelLocalizaciones->delete($id);
                $data['lugares'] = $this->ModelLugares->get_all_data();
                $data['peliculas'] = $this->ModelPeliculas->get_all_data();
                $data['localizaciones'] = $this->ModelLocalizaciones->get_all_data();
                $data['msg'] = '';
                if($result > 0){
                    $data['msg'] = 'Localizacion eliminado con exito';
                }else{
                    $data['msg'] = 'Error al eliminar una localizacion';
                }
                $data['viewName'] = 'usuario';
                $this->load->view('plantilla', $data);
            }     
        }

        public function update($id){
            if ($this->comprobarLogin()) {
                $descripcion = $this->input->get_post("descripcionLocalizacion");
                $fotografia = $this->input->get_post("fotografiaLocalizacion");
                $id_lugar = $this->input->get_post("id_lugar");
                $id_pelicula = $this->input->get_post("id_pelicula");
                $result = $this->ModelLocalizaciones->update($id, $descripcion, $fotografia, $id_lugar, $id_pelicula);
                $data['lugares'] = $this->ModelLugares->get_all_data();
                $data['peliculas'] = $this->ModelPeliculas->get_all_data();
                $data['localizaciones'] = $this->ModelLocalizaciones->get_all_data();
                $data['msg'] = '';
                if($result > 0){
                    $data['msg'] = 'Localizacion actualizado correctamente';
                }else{
                    $data['msg'] = 'Error al actualizar una localizacion';
                }
                $data['viewName'] = 'usuario';
                $this->load->view('plantilla', $data);                                       
            }
        }


    }
?>