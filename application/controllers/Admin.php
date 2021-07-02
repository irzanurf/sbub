<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php';
class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('M_Login');
        $current_user=$this->M_Login->is_role();
        //cek session dan level user
        if($this->M_Login->is_role() != "1"){
            redirect("welcome/");
        }
        $this->load->model('M_Akun');
        $this->load->model('M_Prodi');
        $this->load->model('M_Pelaporan');
        $this->load->model('M_Prestasi');
        $this->load->model('M_Pribadi');
        $this->load->model('M_Pengumuman');
    }

    public function index()
    {
        $username = $this->session->userdata('username');
        $header['angkatan'] = $this->M_Pelaporan->get_angkatan()->result();
        $this->load->view('layout/header_admin', $header);
        $this->load->view('admin/dashboard');
        $this->load->view("layout/footer_admin");
    }

    public function prodi()
    {
        $username = $this->session->userdata('username');
        $data['dep']= $this->M_Prodi->get_prodi()->result();
        $header['angkatan'] = $this->M_Pelaporan->get_angkatan()->result();
        $this->load->view('layout/header_admin', $header);
        $this->load->view('admin/prodi', $data);
        // $this->load->view("layout/footer");
    }

    public function addProdi()
    {
        $username = $this->input->post('username',true);
        $prodi = $this->input->post('prodi',true);
        $password = $this->input->post('password',true);
        $data = [
            "username"=>$username,
            "prodi"=>$prodi,
        ];
        $akun = [
            "username"=>$username,
            "password"=>MD5($password),
            "role"=>4,
        ];
        $this->M_Prodi->insert_prodi($data,$username);
        $this->M_Prodi->insert_akun($akun,$username);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-block" align="center"><strong>Data berhasil direkam</strong></div>');
        redirect("Admin/prodi"); 
    }

    public function updateProdi()
    {
        $id = $this->input->post('id');
        $prodi = $this->input->post('prodi',true);
        $username = $this->input->post('username',true);
        $data = [
            "prodi"=>$prodi,
            "username"=>$username,
        ];
        $akun = [
            "username"=>$username,
        ];
        $this->M_Prodi->update_prodi($data,$id);
        $this->M_Prodi->update_akun($akun,$id);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-block" align="center"><strong>Data berhasil direkam</strong></div>');
        redirect("Admin/prodi"); 
    }

    public function akun_prodi()
    {
        $username = $this->input->post('username');
        if($username==NULL){
            redirect("Admin/prodi");
        }
        $data['prodi'] = $this->M_Prodi->getwhere_prodi(array('username'=>"$username"))->row();
        $header['angkatan'] = $this->M_Pelaporan->get_angkatan()->result();
        $this->load->view('layout/header_admin', $header);
        $this->load->view('admin/akun_prodi', $data);
        $this->load->view("layout/footer_admin");
    }

    public function changePass()
    {
        $username = $this->input->post('username',true);
        $pass = $this->input->post('pass',true);
        $password = [
            'password'=>MD5($pass),
        ];
        $this->M_Akun->changePass($username, $password);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-block" align="center"><strong>Data berhasil direkam</strong></div>');
        redirect("Admin/daftar_pelaporan"); 
    }

    public function delete_prodi()
    {
        $username = $this->input->post('username');
        $this->M_Prodi->del_prodi(array('username'=>"$username"));
        $this->M_Akun->del_akun(array('username'=>"$username"));
        redirect("Admin/prodi"); 
    }

    public function daftar_pelaporan()
    {
        $username = $this->session->userdata('username');
        $data['view'] = $this->M_Pelaporan->get_pelaporan()->result();
        $data['prodi'] = $this->M_Prodi->get_prodi()->result();
        $header['angkatan'] = $this->M_Pelaporan->get_angkatan()->result();
        $this->load->view('layout/header_admin', $header);
        $this->load->view('admin/daftar_pelaporan', $data);
        // $this->load->view("layout/footer");
    }

    public function pelaporan_angkatan($angkatan)
    {
        $username = $this->session->userdata('username');
        $data['view'] = $this->M_Pelaporan->get_pelaporanangkatan(array('angkatan'=>$angkatan))->result();
        $data['prodi'] = $this->M_Prodi->get_prodi()->result();
        $header['angkatan'] = $this->M_Pelaporan->get_angkatan()->result();
        $this->load->view('layout/header_admin', $header);
        $this->load->view('admin/daftar_pelaporan', $data);
        // $this->load->view("layout/footer");
    }


    public function tambah_mhs()
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
            "nim"=>$username,
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

        $akun = [
            "username"=>$username,
            "password"=>md5($username),
            "role"=>3,
        ];

        for($i=1; $i<=8; $i++){
            $pelaporan=[
                "mahasiswa"=>$username,
                "semester"=>$i,
            ];
            $this->M_Pelaporan->insert_mahasiswa($pelaporan);
        }

        $this->M_Pribadi->insert_mahasiswa($data,$username);
        $this->M_Akun->insert_akun($akun,$username);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-block" align="center"><strong>Data berhasil direkam</strong></div>');
        redirect("Admin/daftar_pelaporan"); 
    }

    public function akun_mhs()
    {
        $nim = $this->input->get('nim');
        $data['mhs']= $this->M_Pribadi->getwhere_pribadi(array('tb_pribadi.nim'=>"$nim"))->row();
        $header['angkatan'] = $this->M_Pelaporan->get_angkatan()->result();
        $this->load->view('layout/header_admin', $header);
        $this->load->view('admin/akun_mhs', $data);
        $this->load->view("layout/footer_admin");
    }

    public function pribadi()
    {
        $username = $this->input->get('nim');
        $header['profile'] = $this->M_Pribadi->get_profile(array ('nim'=>"$username"))->row();
        $data['diri'] = $this->M_Pribadi->getwhere_pribadi(array('nim'=>"$username"))->row();
        $data['prodi'] = $this->M_Prodi->get_prodi()->result();
        $header['angkatan'] = $this->M_Pelaporan->get_angkatan()->result();
        $this->load->view('layout/header_admin', $header);
        $this->load->view('admin/data_pribadi',$data);
        $this->load->view("layout/footer_admin");
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

    public function akademik_semester()
    {
        $nim = $this->input->get('nim');
        $semester = $this->input->get('semester_now');
        $data['nim'] = $nim;
        $data['semester_now'] = $semester;
        $data['semester'] = $this->M_Pelaporan->get_semester(array('mahasiswa'=>"$nim"))->result();
        $data['akademik'] = $this->M_Pelaporan->getwhere_akademik(array('mahasiswa'=>"$nim", 'semester'=>"$semester",))->row();
        $data['prestasi'] = $this->M_Prestasi->getwhere_prestasi(array('tb_pelaporan.mahasiswa'=>"$nim", 'tb_pelaporan.semester'=>"$semester",))->result();
        $header['angkatan'] = $this->M_Pelaporan->get_angkatan()->result();
        $this->load->view('layout/header_admin', $header);
        $this->load->view('admin/akademik_semester',$data);
        $this->load->view("layout/footer_admin");
    }

    public function delete_mhs()
    {
        $username = $this->input->post('nim');
        $this->M_Pelaporan->del_mhs(array('mahasiswa'=>"$username"));
        $this->M_Prestasi->del_prestasi(array('nim'=>"$username"));
        $this->M_Pribadi->del_mhs(array('nim'=>"$username"));
        $this->M_Akun->del_akun(array('username'=>"$username"));
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-block" align="center"><strong>Data berhasil direkam</strong></div>');
        redirect("Admin/daftar_pelaporan"); 
    }

    public function pengumuman()
    {
        $username = $this->session->userdata('username');
        $data['view'] = $this->M_Pengumuman->get_pengumuman()->result();
        $header['angkatan'] = $this->M_Pelaporan->get_angkatan()->result();
        $this->load->view('layout/header_admin', $header);
        $this->load->view('admin/pengumuman', $data);
        // $this->load->view("layout/footer_admin");
    }

    public function tambah_pengumuman()
    {
        $username = $this->session->userdata('username');
        $header['angkatan'] = $this->M_Pelaporan->get_angkatan()->result();
        $this->load->view('layout/header_admin', $header);
        $this->load->view('admin/tambah_pengumuman');
        $this->load->view("layout/footer_admin");
    }

    public function edit_pengumuman()
    {
        $username = $this->session->userdata('username');
        $id=$this->input->get('id');
        $data['v'] = $this->M_Pengumuman->getwhere_pengumuman(array('id'=>$id))->row();
        $header['angkatan'] = $this->M_Pelaporan->get_angkatan()->result();
        $this->load->view('layout/header_admin', $header);
        $this->load->view('admin/edit_pengumuman', $data);
        $this->load->view("layout/footer_admin");
    }

    public function insert_pengumuman()
    {
        $username = $this->input->post('username',true);
        $judul = $this->input->post('judul',true);
        $content = $this->input->post('content',true);
        $date = date('Y-m-d');
        $data = [
            'judul'=>$judul,
            'pengumuman'=>$content,
            'head'=>$content,
            'date'=>$date,
        ];
        $this->M_Pengumuman->insert_pengumuman($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-block" align="center"><strong>Data berhasil direkam</strong></div>');
        redirect("Admin/pengumuman"); 
    }

    public function update_pengumuman()
    {
        $username = $this->input->post('username',true);
        $id = $this->input->post('id',true);
        $judul = $this->input->post('judul',true);
        $content = $this->input->post('content',true);
        $date = date('Y-m-d');
        $data = [
            'judul'=>$judul,
            'pengumuman'=>$content,
            'head'=>$content,
            'date'=>$date,
        ];
        $this->M_Pengumuman->update_pengumuman($data, $id);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-block" align="center"><strong>Data berhasil direkam</strong></div>');
        redirect("Admin/pengumuman"); 
    }

    public function delete_pengumuman()
    {
        $id = $this->input->post('id');
        $this->M_Pengumuman->del_pengumuman(array('id'=>"$id"));
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-block" align="center"><strong>Data berhasil direkam</strong></div>');
        redirect("Admin/pengumuman"); 
    }

}