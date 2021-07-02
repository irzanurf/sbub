<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Pelaporan extends CI_Model
{
    public function get_pelaporan()
    {
        $query = $this->db->select('tb_pribadi.nama, tb_prodi.prodi, tb_pribadi.angkatan, tb_pribadi.nim')
        ->from('tb_pribadi')
        ->join('tb_prodi','tb_pribadi.prodi=tb_prodi.id','inner')
        ->get();
        return $query;
    }
    
    public function get_pelaporanprodi($data)
    {
        $query = $this->db->select('tb_pribadi.nama, tb_prodi.prodi, tb_pribadi.angkatan, tb_pribadi.nim')
        ->from('tb_pribadi')
        ->join('tb_prodi','tb_pribadi.prodi=tb_prodi.id','inner')
        ->where($data)
        ->get();
        return $query;
    }

    public function get_pelaporanangkatan($data)
    {
        $query = $this->db->select('tb_pribadi.nama, tb_prodi.prodi, tb_pribadi.angkatan, tb_pribadi.nim')
        ->from('tb_pribadi')
        ->join('tb_prodi','tb_pribadi.prodi=tb_prodi.id','inner')
        ->where($data)
        ->get();
        return $query;
    }

    public function get_semester(array $data)
    {
        $query = $this->db->select('semester')
        ->from('tb_pelaporan')
        ->where($data)
        ->order_by('semester','asc')
        ->get();
        return $query;
    }

    public function update_pelaporan($data, $set)
    {
        $this->db->where($set);
        $this->db->update('tb_pelaporan',$data);
    }

    public function getwhere_akademik($data)
    {
        $query = $this->db->select('*')
        ->from('tb_pelaporan')
        ->where($data)
        ->get();
        return $query;
    }

    public function get_angkatan()
    {
        $query = $this->db->distinct()
        ->select('tb_pribadi.angkatan')
        ->from('tb_pelaporan')
        ->join('tb_pribadi','tb_pelaporan.mahasiswa=tb_pribadi.nim','inner')
        ->get();
        return $query;
    }

    public function get_angkatanprodi($data)
    {
        $query = $this->db->distinct()
        ->select('tb_pribadi.angkatan')
        ->from('tb_pelaporan')
        ->join('tb_pribadi','tb_pelaporan.mahasiswa=tb_pribadi.nim','inner')
        ->where($data)
        ->get();
        return $query;
    }

    public function insert_mahasiswa($data)
    {
        $query = $this->db->select('*')
        ->from('tb_pelaporan')
        ->where($data)
        ->get();
        $result = $query->result_array();
        $count = count($result);
    
        if (empty($count)){
            $this->db->insert('tb_pelaporan',$data);
        }
        else{

        }   
    }

    public function del_mhs(array $data){
        $query = $this->db->delete('tb_pelaporan',$data);
        return $query;
    }

    public function insert_semester($username)
    {

        $sem = $this->db->select_max('semester')
        ->from('tb_pelaporan')
        ->where('mahasiswa',$username)
        ->get();
        $add=((int)$sem->row()->semester)+1;

        $data = [
            "mahasiswa"=>$username,
            "semester"=>$add,
        ];

        if (empty($count)){
            $this->db->insert('tb_pelaporan',$data);
            return $this->db->insert_id();
        }
        else{

        }   
        
    }

}