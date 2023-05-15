<?php

class Data_model extends CI_model
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
    public function ambilBalitaDalamHist()
    {
        return $this->db->query("SELECT * FROM balita b WHERE b.id_balita not IN( SELECT h.id_balita FROM hsitory h where month(h.tgl_periksa)=month(now()) ) ORDER BY dusun")->result();
    }

    public function ambilIdBio($id)
    {
        return $this->db->query("select id_balita,nama_balita from balita where id_balita=" . $id . "")->row();
    }


    public function input_data3($data)
    {
        // Cek apakah data untuk balita tertentu sudah ada di bulan tertentu
        $query = $this->db->get_where('hsitory', array('id_balita' => $data['id_balita'], 'MONTH(tgl_periksa)' => date('m')));
        $result = $query->row();

        // Jika tidak ada data untuk balita tertentu di bulan tertentu, maka masukkan data baru
        if (empty($result)) {
            $this->db->insert('hsitory', $data);
            return true;
        } else {
            return false; // Data sudah ada, tidak melakukan input
        }
        // $this->db->insert('hsitory', $data);
    }
    public function getStts()
    {
        return $this->db->get('status')->result();
    }
    public function getImun()
    {
        return $this->db->get('imun')->result();
    }
    public function getBalita()
    {
        return $this->db->get('balita')->result();
    }

    public function edit_data3($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data3($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function hapus_data3($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function validasi1($id)
    {
        $this->db->query("UPDATE hsitory SET id_validasi = 1 where id_history = '" . $id . "';");
    }
    public function validasi2($id)
    {
        $this->db->query("UPDATE hsitory SET id_validasi = 2 where id_history = '" . $id . "';");
    }
}
