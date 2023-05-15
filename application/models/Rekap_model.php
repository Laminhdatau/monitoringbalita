<?php

class Rekap_model extends CI_model
{

    public function tampil_data3()
    {

        $waktu = 'month(now())';
        $w = "";
        if ($waktu == 'month(now())') {
            $w = "WHERE MONTH(h.tgl_periksa) = MONTH(NOW()) 
        or b.id_balita NOT IN (SELECT id_balita FROM hsitory);";
        }
        return $this->db->query("SELECT b.*, h.*, i.nama_imun, s.nama_status 
        FROM balita b 
        LEFT JOIN hsitory h ON b.id_balita = h.id_balita 
        LEFT JOIN imun i ON i.id_imun = h.id_imun 
        LEFT JOIN status s ON s.id_status = h.id_status 
        " . $w . "
                                    ");
    }
}