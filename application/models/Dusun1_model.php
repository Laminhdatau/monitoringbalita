<?php

class Dusun1_model extends CI_model
{
    public function tampil_data()
    {
        $this->db->where('dusun', '1');
        return $this->db->get('balita');
    }

    public function input_data($data)
    {
        $this->db->insert('balita', $data);
    }

    public function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
