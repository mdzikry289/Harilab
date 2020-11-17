<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('login_model');
        $this->load->library('form_validation');
    }

    public function index()
    {

            if($this->login_model->logged_id())
            {
                //jika memang session sudah terdaftar, maka redirect ke halaman dahsboard
                redirect("admin/dashboard");

            }else{

                //jika session belum terdaftar

                //set form validation
                $this->form_validation->set_rules('username', 'Username', 'required');
                $this->form_validation->set_rules('password', 'Password', 'required');

                //set message form validation
                $this->form_validation->set_message('required', '<div class="alert alert-danger" style="margin-top: 3px">
                    <div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> harus diisi</div></div>');

                //cek validasi
                if ($this->form_validation->run() == TRUE) {

                //get data dari FORM
                $username = $this->input->post("username", TRUE);
                $password = $this->input->post("password", TRUE);

                //checking data via model
                $checking = $this->login_model->check_login('tb_users', array('username' => $username), array('password' => md5($password)));

                //jika ditemukan, maka create session
                if ($checking != FALSE) {
                    foreach ($checking as $apps) {

                        $session_data = array(
                            'user_id'   => $apps->id_user,
                            'user_name' => $apps->username,
                            'user_nama' => $apps->nama_user,
                            'level' => $apps->level,
                            'foto' => $apps->image_users
                        );
                        //set session userdata
                        $this->session->set_userdata($session_data);

                        redirect('admin/dashboard');

                    }
                }else{

                    $data['error'] = '<div class="alert alert-danger" style="margin-top: 5px">
                        <div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> username atau password salah!</div></div>';
                    $this->load->view('login', $data);
                }

            }else{

                $this->load->view('login');
            }

        }

    }
}