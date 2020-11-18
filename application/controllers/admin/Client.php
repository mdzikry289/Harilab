<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model
        $this->load->model("admin/client_model");
        $this->load->model("admin/settings_model");
        $this->load->model("login_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        //cek session
        if($this->login_model->logged_id()){
            $data["settings"] = $this->settings_model->getAll();
            $data["client"] = $this->client_model->getAll();
            $this->load->view("admin/list_client", $data);
        } else{
            //jika tidak ada session maka redirect ke halaman login
            redirect("login");
        }
    }

    public function add()
    {
        $client = $this->client_model;
        $validation = $this->form_validation;
        $validation->set_rules($client->rules());
        if ($validation->run()) {
            $client->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        
        $data["settings"] = $this->settings_model->getAll();
        $this->load->view("admin/client_add", $data);
    }

    public function edit($id_client = null)
    {
        if (!isset($id_client)) redirect('admin/client');
       
        $client = $this->client_model;
        $validation = $this->form_validation;
        $validation->set_rules($client->rules());

        if ($validation->run()) {
            $client->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["client"] = $client->getById($id_client);
        $data["settings"] = $this->settings_model->getAll();
        if (!$data["client"]) show_404();
        
        $this->load->view("admin/client_edit", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->client_model->delete($id)) {
            redirect(site_url('admin/client/'));
        }
    }
}
