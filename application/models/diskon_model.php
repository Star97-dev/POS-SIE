<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Diskon_model extends CI_Model{
		
        public function get()
		{
			$this->db->from('diskon');
			$query = $this->db->get();
			return $query;
		}

		public function getDiskon(){
			$query = $this->db->query("SELECT hargaDiskon FROM diskon WHERE CURDATE()>= tanggalAwal AND CURDATE()<= tanggalAkhir");
			return $query;
		}

        public function add($data)
		{
			$params = [
				'nama' => $data['nama'],
				'hargaDiskon' => $data['hargaDiskon'],
				'tanggalAwal' => $data['tanggalAwal'],
                'tanggalAkhir' => $data['tanggalAkhir']
			];
			$this->db->insert('diskon', $params);
		}
    }