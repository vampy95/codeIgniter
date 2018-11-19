<?php
    include_once("seguridad.php"); 
    class ControllersPeliculas extends seguridad{

        public function __construct(){
            parent::__construct();
            $this->load->model('ModelLugares');
            $this->load->model('ModelPeliculas');    
            $this->load->model('ModelLocalizaciones');
            $this->load->model('ModelImagenes');                      
        }

        public function index(){
            if ($this->comprobarLogin()) {
                $data['viewName'] = 'insertPelicula';
                $this->load->view('plantilla', $data);
            }          
        }

        public function insert(){
            if ($this->comprobarLogin()) {
                $titulo = $this->input->get_post("titulo");
                $anio = $this->input->get_post("anio");
                $pais = $this->input->get_post("pais");
                $cartel = $this->input->get_post("cartel");
                $data['lugares'] = $this->ModelLugares->get_all_data();
                $data['localizaciones'] = $this->ModelLocalizaciones->get_all_data();
                $data['msg'] = '';
                if($this->ModelImagenes->subir_imagenes()){
                    $cartel = $this->ModelImagenes->subir_imagenes();
                    $result = $this->ModelPeliculas->insert($titulo, $anio, $pais, $cartel);
                    if($result > 0){
                        $data['msg'] = 'Pelicula insertado con exito';
                    }else{
                        $data['msg'] = 'Error al insertar una pelicula';
                    }
                }
                $data['peliculas'] = $this->ModelPeliculas->get_all_data();
                $data['viewName'] = 'usuario';
                $this->load->view('plantilla', $data);
            } 
        }

        public function delete(){
            if ($this->comprobarLogin()) {
                $id = $this->input->get("id");
                $result = $this->ModelPeliculas->delete($id);
                $data['lugares'] = $this->ModelLugares->get_all_data();
                $data['peliculas'] = $this->ModelPeliculas->get_all_data();
                $data['localizaciones'] = $this->ModelLocalizaciones->get_all_data();
                $data['msg'] = '';
                if($result > 0){
                    $data['msg'] = 'Pelicula eliminado con exito';
                }else{
                    $data['msg'] = 'Error al eliminar una pelicula';
                }
                $data['viewName'] = 'usuario';
                $this->load->view('plantilla', $data);
            }      
        }

        public function update($id){
            if ($this->comprobarLogin()) {
                $titulo = $this->input->get_post("tituloPelicula");
                $anio = $this->input->get_post("anioPelicula");
                $pais = $this->input->get_post("paisPelicula");
                $cartel = $this->input->get_post("cartelPelicula");
                $result = $this->ModelPeliculas->update($id, $titulo, $anio, $pais);
                $data['lugares'] = $this->ModelLugares->get_all_data();
                $data['peliculas'] = $this->ModelPeliculas->get_all_data();
                $data['localizaciones'] = $this->ModelLocalizaciones->get_all_data();
                $data['msg'] = '';
                if($result > 0){
                    $data['msg'] = 'Pelcicula actualizado correctamente';
                }else{
                    $data['msg'] = 'Error al actualizar una pelicula';
                }
                $data['viewName'] = 'usuario';
                $this->load->view('plantilla', $data);
            }                                        
        }
        
    }
?>