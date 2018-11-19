<?php
    class ModelLugares extends CI_Model{

        public function get_all_data(){
            $resultado = $this->db->query("SELECT * FROM lugares");
            if($resultado->num_rows() > 0){
                foreach ($resultado->result() as $row) {
                    $data[] = $row;
                }
            }
            return $data;
        }
        public function insert($nombre, $descripcion, $longitud, $latitud){
            $this->db->query("INSERT INTO lugares (nombre, descripcion, longitud, latitud) VALUES ('$nombre', '$descripcion', '$longitud', '$latitud');");
            return $this->db->affected_rows();
        }

        public function delete($id){
            $this->db->query("DELETE FROM lugares WHERE id='$id';");
            return $this->db->affected_rows();
        }

        public function update($id, $nombre, $descripcion, $longitud, $latitud){
            $result = $this->db->query("UPDATE lugares SET nombre = '$nombre', descripcion = '$descripcion', longitud = '$longitud', latitud='$latitud' WHERE id = $id;");
            return $this->db->affected_rows();
        }
    }
?>
