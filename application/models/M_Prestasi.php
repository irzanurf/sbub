<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Prestasi extends CI_Model
{
    public function insert_prestasi($data)
    {
        $this->db->insert('tb_prestasi',$data);
        return $this->db->insert_id();
    }

    public function update_prestasi($data, $id)
    {
        $this->db->where('id',$id);
        $this->db->update('tb_prestasi',$data);
    }

    public function getwhere_prestasi(array $data)
    {
        $query = $this->db->select('tb_prestasi.*')
        ->from('tb_prestasi')
        ->join('tb_pelaporan','tb_prestasi.id_pelaporan=tb_pelaporan.id','inner')
        ->where($data)
        ->get();
        return $query;
    }

    public function del_prestasi(array $data)
    {
        $query = $this->db->delete('tb_prestasi',$data);
        return $query;
    }

}