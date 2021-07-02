<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Pribadi extends CI_Model
{
    public function getwhere_pribadi(array $data)
    {
        $query = $this->db->select('tb_pribadi.*, tb_prodi.prodi as prod')
        ->from('tb_pribadi')
        ->join('tb_prodi','tb_pribadi.prodi=tb_prodi.id','inner')
        ->where($data)
        ->get();
        return $query;
    }

    public function get_profile(array $data)
    {
        $query = $this->db->select('nama, profile')
        ->from('tb_pribadi')
        ->where($data)
        ->get();
        return $query;
    }

    public function update_data($data,$username)
    {
        $this->db->where('nim',$username);
        $this->db->update('tb_pribadi',$data);
    }

    public function insert_mahasiswa($data,$username)
    {
        $query = $this->db->select('*')
        ->from('tb_pribadi')
        ->where('nim',"$username")
        ->get();
        $result = $query->result_array();
        $count = count($result);
    
        if (empty($count)){
            $this->db->insert('tb_pribadi',$data);
        }
        else{

        }   
    }

    public function del_mhs(array $data){
        $query = $this->db->delete('tb_pribadi',$data);
        return $query;
    }

}