<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    
    function __construct(){
        parent::__construct();
        $this->load->model("ModelAuth");
    }

    public function index()
    {
    	$data["title"] = "Login - SI Sundari";
        $this->load->view('auth/login', $data);
    }

    public function konfirmasi(){
    	$login_rules = array(
    		array(
    			"field" => "nama_sundari",
    			"label" => "Nama",
    			"rules" => "required"
    		),
    		array(
    			"field" => "password_sundari",
    			"label" => "Password",
    			"rules" => "required|min_length[8]|max_length[32]"
    		)
    	);
    	$this->form_validation->set_rules($login_rules);

        // FALSE VALIDATION
    	if ($this->form_validation->run() == FALSE) {
    		
            $data["title"] = "Login - SI Sundari";
    		$this->load->view("auth/login", $data);

    	} else {
    		$nama = $this->input->post("nama_sundari");
	        $password = $this->input->post("password_sundari");

            // Ambil data dari database
            $row = $this->ModelAuth->getDataByNama($nama);
            foreach ($row as $r) {
                $getId = $r->id_user;
                $getNama = $r->nama;
                $getPassword = $r->password;
                $getHakAkses = $r->hak_akses;
            }

            // Cek keberadaan akun
            if(isset($getNama)){

                // Cek kebenaran password
                if ($getPassword == $password) {

                    // Buat inisiasi session login
                    // $data_login = "Hello";
                    $data_login = array(
                        "id_user" => $getId,
                        "nama" => $nama,
                        "status" => "login"
                    );

                    $this->session->set_userdata($data_login);

                    // Lihat Hak Akses
                    if ($getHakAkses == "admin") {

                        // Buat session & Menuju admin
                        $this->session->set_userdata("hak_akses", $getHakAkses);
                        redirect("admin/home_admin");
                    }else{

                        // Buat session & Menuju pegawai
                        $this->session->set_userdata("hak_akses", $getHakAkses);

                        // Untuk session array transaksi
                        $this->session->set_userdata("data_beli", array());
                        redirect("pegawai/home_pegawai");
                    }

                }else{
                    echo "<script>alert('Password salah')</script>";
                    redirect('Auth');
                }

            }else{
                echo "<script>alert('Username tidak ditemukan')</script>";
                redirect('Auth');

            }
    	}
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect("Auth");
    }
}
