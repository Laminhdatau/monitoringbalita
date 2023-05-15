<?php

class Dusun2_model extends CI_model
{
    public function tampil_data1()
    {
        $this->db->where('dusun', '2');
        return $this->db->get('balita');
    }

    public function input_data1($data)
    {
        $this->db->insert('balita', $data);
    }

    public function edit_data1($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data1($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function hapus_data1($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
