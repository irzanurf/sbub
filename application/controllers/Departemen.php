<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php';
class Departemen extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('M_Login');
        $current_user=$this->M_Login->is_role();
        //cek session dan level user
        if($this->M_Login->is_role() != "2"){
            redirect("welcome/");
        }
        $this->load->model('M_Akun');
        $this->load->model('M_Prodi');
        $this->load->model('M_Pelaporan');
        $this->load->model('M_Prestasi');
        $this->load->model('M_Pribadi');
    }

    public function index()
    {
        redirect("Departemen/daftar_pelaporan"); 
    }

    public function daftar_pelaporan()
    {
        $username = $this->session->userdata('username');
        $cek = $this->M_Prodi->getwhere_prodi(array("username"=>$username))->row();
        $prodi = $cek->id;
        $nama = $cek->prodi;
        $data['view'] = $this->M_Pelaporan->get_pelaporanprodi(array("tb_pribadi.prodi"=>$prodi))->result();
        $header['angkatan'] = $this->M_Pelaporan->get_angkatanprodi(array("tb_pribadi.prodi"=>$prodi))->result();
        $header['nama'] = $nama;
        $this->load->view('layout/header_dep', $header);
        $this->load->view('departemen/daftar_pelaporan', $data);
        // $this->load->view("layout/footer");
    }

    public function pelaporan_angkatan($angkatan)
    {
        $username = $this->session->userdata('username');
        $cek = $this->M_Prodi->getwhere_prodi(array("username"=>$username))->row();
        $prodi = $cek->id;
        $nama = $cek->prodi;
        $data['view'] = $this->M_Pelaporan->get_pelaporanprodi(array('angkatan'=>$angkatan, "tb_pribadi.prodi"=>$prodi))->result();
        $data['prodi'] = $this->M_Prodi->get_prodi()->result();
        $header['angkatan'] = $this->M_Pelaporan->get_angkatanprodi(array("tb_pribadi.prodi"=>$prodi))->result();
        $header['nama'] = $nama;
        $this->load->view('layout/header_dep', $header);
        $this->load->view('departemen/daftar_pelaporan', $data);
        // $this->load->view("layout/footer");
    }


    public function update_diri()
    {
        $username = $this->input->post('nim',true);
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
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-block" align="center"><strong>Data berhasil direkam</strong></div>');
        redirect("Admin/pribadi?nim="."$username"); 

    }

    public function akademik()
    {
        $username = $this->session->userdata('username');
        $cek = $this->M_Prodi->getwhere_prodi(array("username"=>$username))->row();
        $prodi = $cek->id;
        $nama = $cek->prodi;
        $nim = $this->input->get('nim');
        $data['nim'] = $nim;
        $data['semester'] = $this->M_Pelaporan->get_semester(array('mahasiswa'=>"$nim"))->result();
        $header['angkatan'] = $this->M_Pelaporan->get_angkatanprodi(array("tb_pribadi.prodi"=>$prodi))->result();
        $header['nama'] = $nama;
        $this->load->view('layout/header_dep', $header);
        $this->load->view('departemen/akademik',$data);
        $this->load->view("layout/footer_admin");
    }

    public function akademik_semester()
    {
        $username = $this->session->userdata('username');
        $cek = $this->M_Prodi->getwhere_prodi(array("username"=>$username))->row();
        $prodi = $cek->id;
        $nama = $cek->prodi;
        $nim = $this->input->get('nim');
        $semester = $this->input->get('semester_now');
        $data['nim'] = $nim;
        $data['semester_now'] = $semester;
        $data['semester'] = $this->M_Pelaporan->get_semester(array('mahasiswa'=>"$nim"))->result();
        $data['akademik'] = $this->M_Pelaporan->getwhere_akademik(array('mahasiswa'=>"$nim", 'semester'=>"$semester",))->row();
        $data['prestasi'] = $this->M_Prestasi->getwhere_prestasi(array('tb_pelaporan.mahasiswa'=>"$nim", 'tb_pelaporan.semester'=>"$semester",))->result();
        $header['angkatan'] = $this->M_Pelaporan->get_angkatanprodi(array("tb_pribadi.prodi"=>$prodi))->result();
        $header['nama'] = $nama;
        $this->load->view('layout/header_dep', $header);
        $this->load->view('departemen/akademik_semester',$data);
        $this->load->view("layout/footer_admin");
    }

    public function pribadi()
    {
        $username = $this->session->userdata('username');
        $cek = $this->M_Prodi->getwhere_prodi(array("username"=>$username))->row();
        $prodi = $cek->id;
        $nama = $cek->prodi;
        $username = $this->input->get('nim');
        $header['profile'] = $this->M_Pribadi->get_profile(array ('nim'=>"$username"))->row();
        $data['diri'] = $this->M_Pribadi->getwhere_pribadi(array('nim'=>"$username"))->row();
        $data['prodi'] = $this->M_Prodi->get_prodi()->result();
        $header['angkatan'] = $this->M_Pelaporan->get_angkatanprodi(array("tb_pribadi.prodi"=>$prodi))->result();
        $header['nama'] = $nama;
        $this->load->view('layout/header_dep', $header);
        $this->load->view('departemen/data_pribadi',$data);
        $this->load->view("layout/footer_admin");
    }


}