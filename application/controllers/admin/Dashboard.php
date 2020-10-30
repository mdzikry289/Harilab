<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model
        $this->load->model('m_login');
        $this->load->model('admin/team_model');
		$this->load->model('admin/client_model');
		$this->load->model('admin/proyek_model');
    }

    public function index()
    {
        if($this->m_login->logged_id())
        {
            $data["total_team"] = $this->team_model->hitungJumlahTeam();
            $data["total_client"] = $this->client_model->hitungJumlahClient();
            $data["total_proyek"] = $this->proyek_model->hitungJumlahProyek();
            $this->load->view('admin/dashboard', $data);
            // $this->load->view("admin/dashboard");

        }else{

            //jika session belum terdaftar, maka redirect ke halaman login
            redirect("login");

        }

        
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }

}