<?php
    class ModelLocalizaciones extends CI_Model{

        public function get_all_data(){
            $resultado = $this->db->query("SELECT * FROM localizaciones");
            if($resultado->num_rows() > 0){
                foreach ($resultado->result() as $row) {
                    $data[] = $row;
                }
            }
            return $data;
        }
        public function insert($descripcion, $fotografia, $id_lugar, $id_pelicula){
            $this->db->query("INSERT INTO localizaciones (descripcion, fotografia, id_lugar, id_pelicula) VALUES ('$descripcion', '$fotografia', '$id_lugar', '$id_pelicula');");
            return $this->db->affected_rows();
        }

        public function delete($id){
            $this->db->query("DELETE FROM localizaciones WHERE id='$id';");
            return $this->db->affected_rows();
        }

        public function update($id, $descripcion, $fotografia, $id_lugar, $id_pelicula){
            $result = $this->db->query("UPDATE localizaciones SET descripcion = '$descripcion', fotografia = '$fotografia', id_lugar = '$id_lugar', id_pelicula='$id_pelicula' WHERE id = $id;");
            return $this->db->affected_rows();
        }        
    }
?>