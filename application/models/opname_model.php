<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Opname_model extends CI_Model{

        public function get(){
            return $this->db->get('opname');
        }

        public function getOpname($id){
            $this->db->where('id_bahan', $id);
		    return $this->db->get('bahan');
        }

        public function add($params){
            $this->db->insert('opname', $params);
        }
    }

?>