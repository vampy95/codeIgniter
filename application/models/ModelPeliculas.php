<?php
    class ModelPeliculas extends CI_Model{

        public function get_all_data(){
            $resultado = $this->db->query("SELECT * FROM peliculas");
            if($resultado->num_rows() > 0){
                foreach ($resultado->result() as $row) {
                    $data[] = $row;
                }
            }
            return $data;
        }
        public function insert($titulo, $anio, $pais, $cartel){
            $this->db->query("INSERT INTO peliculas (titulo, año, pais, cartel) VALUES ('$titulo', '$anio', '$pais', '$cartel');");
            return $this->db->affected_rows();
        }

        public function delete($id){
            $this->db->query("DELETE FROM peliculas WHERE id='$id';");
            return $this->db->affected_rows();
        }

        public function update($id, $titulo, $anio, $pais){
            $result = $this->db->query("UPDATE peliculas SET titulo = '$titulo', año = '$anio', pais = '$pais' WHERE id = $id;");
            return $this->db->affected_rows();
        }
        
    }
?>