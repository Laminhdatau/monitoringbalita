<?php

class Dusun3_model extends CI_model
{
    public function tampil_data2()
    {
        $this->db->where('dusun', '3');
        return $this->db->get('balita');
    }

    public function input_data2($data)
    {
        $this->db->insert('balita', $data);
    }

    public function edit_data2($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data2($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function hapus_data2($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
