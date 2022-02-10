<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Drilldown_model extends CI_model{
        public function get_cart($years){

            if ($years == null){
                $years = date('Y');
                    }

            $query = "SELECT MONTHNAME(tanggal) as bulan, YEAR(tanggal) as tahun, 
            (SELECT SUM(total) from penjualan where MONTHNAME(tanggal)=bulan && YEAR(tanggal)= tahun) as omset,
            (SELECT SUM(total) from penjualan where MONTHNAME(tanggal)=bulan && YEAR(tanggal)= tahun) as total, 
            (SELECT SUM(biaya) from pengeluaran where MONTHNAME(tanggal)=bulan && YEAR(tanggal)=tahun) as stok 
            from penjualan  WHERE YEAR(tanggal) = '$years' GROUP By MONTH(tanggal)";
            return $this->db->query($query);
        }

        public function get_date(){
            $query = "SELECT DISTINCT(YEAR(tanggal)) as tahun from penjualan";
            return $this->db->query($query);
        }
    }
?>