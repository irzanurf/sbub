<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mhs extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('M_Login');
        $current_user=$this->M_Login->is_role();
        //cek session dan level user
        if($this->M_Login->is_role() != "3"){
            redirect("welcome/");
        }
        $this->load->model('M_Pelaporan');
        $this->load->model('M_Prestasi');
        $this->load->model('M_Pribadi');
        $this->load->model('M_Prodi');
        $this->load->model('M_Pengumuman');
    }

    public function index()
    {
        $username = $this->session->userdata('username');
        $data['view'] = $this->M_Pengumuman->get_pengumuman()->result();
        $this->load->view('layout/header_mhs');
        $this->load->view('mhs/dashboard', $data);
        $this->load->view("layout/footer");
    }

    public function akademik()
    {
        $username = $this->session->userdata('username');
        $header['profile'] = $this->M_Pribadi->get_profile(array ('nim'=>"$username"))->row();
        $header['semester'] = $this->M_Pelaporan->get_semester(array('mahasiswa'=>"$username"))->result();
        $this->load->view('layout/header_akademik', $header);
        $this->load->view('mhs/akademik');
        $this->load->view("layout/footer");
    }

    public function akademik_semester($id)
    {
        $username = $this->session->userdata('username');
        $header['semester'] = $this->M_Pelaporan->get_semester(array('mahasiswa'=>"$username"))->result();
        $header['profile'] = $this->M_Pribadi->get_profile(array ('nim'=>"$username"))->row();
        $data['semester'] = $id;
        $data['akademik'] = $this->M_Pelaporan->getwhere_akademik(array('mahasiswa'=>"$username", 'semester'=>"$id",))->row();
        $data['prestasi'] = $this->M_Prestasi->getwhere_prestasi(array('tb_pelaporan.mahasiswa'=>"$username", 'tb_pelaporan.semester'=>"$id",))->result();
        $this->load->view('layout/header_akademik', $header);
        $this->load->view('mhs/akademik_semester', $data);
        $this->load->view("layout/footer");
    }

    public function update_akademik()
    {
        $username = $this->session->userdata('username');
        $semester = $this->input->post('semester',true);
        $id = $this->input->post('id',true);
        $sks = $this->input->post('sks',true);
        $ips = str_replace(",", ".", $this->input->post('ips',true));
        $ipk = str_replace(",", ".", $this->input->post('ipk',true));
        
        $set = ["id"=>$id];
        
        $data = [
            "sks"=>$sks,
            "ips"=>$ips,
            "ipk"=>$ipk,
        ];
        $this->M_Pelaporan->update_pelaporan($data,$set);
        $krs = $_FILES['krs'];
        if(empty($krs['name'])){}
            else{
            $config1['upload_path'] = './assets/krs';
            $config1['encrypt_name'] = TRUE;
            $config1['allowed_types'] = 'pdf';

            $this->load->library('upload',$config1,'krs');
            $this->krs->initialize($config1);
            if(!$this->krs->do_upload('krs')){
                echo "Upload Gagal"; die();
            } else {
                $krs=$this->krs->data('file_name');
            }
            $datakrs = [
            "krs"=>$krs,];
            $this->M_Pelaporan->update_pelaporan($datakrs,$set);
        }
        $transkrip = $_FILES['transkrip'];
        if(empty($transkrip['name'])){}
            else{
            $config2['upload_path'] = './assets/transkrip';
            $config2['encrypt_name'] = TRUE;
            $config2['allowed_types'] = 'pdf';

            $this->load->library('upload',$config2,'transkrip');
            $this->transkrip->initialize($config2);
            if(!$this->transkrip->do_upload('transkrip')){
                echo "Upload Gagal"; die();
            } else {
                $transkrip=$this->transkrip->data('file_name');
            }
            $datatranskrip = [
            "transkrip"=>$transkrip,];
            $this->M_Pelaporan->update_pelaporan($datatranskrip,$set);
        }
        redirect (base_url("Mhs/akademik_semester"."/"."$semester")); 

    }

    public function insert_prestasi()
    {
        $username = $this->session->userdata('username');
        $semester = $this->input->post('semester',true);
        $id = $this->input->post('id',true);
        $nama = $this->input->post('nama',true);
        $penyelenggara = $this->input->post('penyelenggara',true);
        $tahun = $this->input->post('tahun',true);
        $tingkat = $this->input->post('tingkat',true);
        
        $data = [
            "id_pelaporan"=>$id,
            "nim"=>$username,
            "nama"=>$nama,
            "penyelenggara"=>$penyelenggara,
            "tahun"=>$tahun,
            "tingkat"=>$tingkat,
        ];
        $id_prestasi = $this->M_Prestasi->insert_prestasi($data);
        $sertifikat = $_FILES['sertifikat'];
        if(empty($sertifikat['name'])){}
            else{
            $config1['upload_path'] = './assets/sertifikat';
            $config1['encrypt_name'] = TRUE;
            $config1['allowed_types'] = 'pdf';

            $this->load->library('upload',$config1,'sertifikat');
            $this->sertifikat->initialize($config1);
            if(!$this->sertifikat->do_upload('sertifikat')){
                echo "Upload Gagal"; die();
            } else {
                $sertifikat=$this->sertifikat->data('file_name');
            }
            $datasertifikat = [
            "sertifikat"=>$sertifikat,];
            $this->M_Prestasi->update_prestasi($datasertifikat,$id_prestasi);
        }
        $foto = $_FILES['foto'];
        if(empty($foto['name'])){}
            else{
            $config2['upload_path'] = './assets/foto';
            $config2['encrypt_name'] = TRUE;
            $config2['allowed_types'] = 'gif|jpg|png|jpeg';

            $this->load->library('upload',$config2,'foto');
            $this->foto->initialize($config2);
            if(!$this->foto->do_upload('foto')){
                echo "Upload Gagal"; die();
            } else {
                $foto=$this->foto->data('file_name');
            }
            $datafoto = [
            "foto"=>$foto,];
            $this->M_Prestasi->update_prestasi($datafoto,$id_prestasi);
        }
        redirect (base_url("Mhs/akademik_semester"."/"."$semester")); 

    }

    public function delete_prestasi()
    {
        $id = $this->input->post('id');
        $semester = $this->input->post('semester');
        $this->M_Prestasi->del_prestasi(array('id'=>$id));
        redirect (base_url("Mhs/akademik_semester"."/"."$semester")); 
    }

    public function pribadi()
    {
        $username = $this->session->userdata('username');
        $header['profile'] = $this->M_Pribadi->get_profile(array ('nim'=>"$username"))->row();
        $data['diri'] = $this->M_Pribadi->getwhere_pribadi(array('nim'=>"$username"))->row();
        $this->load->view('layout/header_pribadi',$header);
        $this->load->view('mhs/pribadi',$data);
        $this->load->view("layout/footer");
    }

    public function edit_pribadi()
    {
        $username = $this->session->userdata('username');
        $header['profile'] = $this->M_Pribadi->get_profile(array ('nim'=>"$username"))->row();
        $data['diri'] = $this->M_Pribadi->getwhere_pribadi(array('nim'=>"$username"))->row();
        $data['prodi'] = $this->M_Prodi->get_prodi()->result();
        $username = $this->session->userdata('username');
        $this->load->view('layout/header_pribadi',$header);
        $this->load->view('mhs/change_data_pribadi',$data);
        $this->load->view("layout/footer");
    }

    public function tambah_semester()
    {
        $username = $this->session->userdata('username');
        $id=$this->M_Pelaporan->insert_semester($username);
        $semester=$this->M_Pelaporan->get_semester(array('id'=>$id))->row()->semester;
        redirect (base_url("Mhs/akademik_semester"."/"."$semester")); 
    }

    public function update_diri()
    {
        $username = $this->session->userdata('username');
        $nik = $this->input->post('nik',true);
        $prodi = $this->input->post('prodi',true);
        $nama = $this->input->post('nama',true);
        $angkatan = $this->input->post('angkatan',true);
        $tempat_lahir = $this->input->post('tempat_lahir',true);
        $tgl_lahir = $this->input->post('tgl_lahir',true);
        $alamat = $this->input->post('alamat',true);
        $sso = $this->input->post('sso',true);
        $email = $this->input->post('email',true);
        $no_hp = $this->input->post('no_hp',true);
        
        $data = [
            "nik"=>$nik,
            "nama"=>$nama,
            "prodi"=>$prodi,
            "angkatan"=>$angkatan,
            "tempat_lahir"=>$tempat_lahir,
            "tgl_lahir"=>$tgl_lahir,
            "alamat"=>$alamat,
            "sso"=>$sso,
            "email"=>$email,
            "no_hp"=>$no_hp,
        ];
        $this->M_Pribadi->update_data($data,$username);
        $profile = $_FILES['profile'];
        if(empty($profile['name'])){}
            else{
            $config['upload_path'] = './assets/fotoProfile';
            $config['encrypt_name'] = TRUE;
            $config['allowed_types'] = '*';

            $this->load->library('upload',$config,'profile');
            $this->profile->initialize($config);
            if(!$this->profile->do_upload('profile')){
                echo "Upload Gagal"; die();
            } else {
                $profile=$this->profile->data('file_name');
            }
            $dataprofile = [
            "profile"=>$profile,];
            $this->M_Pribadi->update_data($dataprofile,$username);
        }
        redirect (base_url("Mhs/pribadi")); 

    }

}