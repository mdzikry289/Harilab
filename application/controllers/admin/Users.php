<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //load model
        $this->load->model("login_model");
        $this->load->model("admin/user_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->login_model->logged_id()) {
            $data["user"] = $this->user_model->getAll();
            $this->load->view("admin/list_user", $data);
        } else{
            redirect("login");
        }
    }

    public function add()
    {
        $user = $this->user_model;
        $validation = $this->form_validation;
        $validation->set_rules($user->rules());
        if ($validation->run()) {
            $user->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/user_add");
    }

    public function edit($id_user = null)
    {
        if (!isset($id_user)) redirect('admin/user');

        $user = $this->user_model;
        $validation = $this->form_validation;
        $validation->set_rules($user->rules());

        if ($validation->run()) {
            $user->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["user"] = $user->getById($id_user);
        if (!$data["user"]) show_404();

        $this->load->view("admin/user_edit", $data);
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->user_model->delete($id)) {
            redirect(site_url('admin/users'));
        }
    }
}
