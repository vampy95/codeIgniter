<?php
    class ModelImagenes extends CI_Model{
        function subir_imagenes(){
            //CONFIGURAMOS LA SUBIDA DE IMAGNES
            $config['upload_path'] = './imgs/'; //ruta donde se guardan las imagenes
            $config['allowed_types'] = 'gif|jpg|png'; //tipos de ficheros permitidos
            $config['max_size']     = '100'; //tamaño maximo del archivo
            $config['max_width'] = '1024'; //ancho maximo de la imagen
            $config['max_height'] = '768'; //largo maximo de la imagen

            $this->load->library('upload', $config); //cargamos la libreria y le pasamos los parametros

            if(!$this->upload->do_upload('cartel')){
                //Almacenamos en un array el error que se produzca al subir una imagen
                $error = array('error' => $this->upload->display_errors());
                return false;
            }else{
                //Si se sube con exito la imagen realizamos el insert en la bd
                $upload_data = $this->upload->data(); //datos del fichero subido
                $file_name = $upload_data['file_name']; //nombre de la imagen subida
                $cartel = 'imgs/'.$file_name; //ruta de la imagen subida
                return $cartel;
            }
        }
    }
?>