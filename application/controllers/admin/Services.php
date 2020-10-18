<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin/services_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["services"] = $this->services_model->getAll();
        $this->load->view("admin/list_services", $data);
    }

    public function add()
    {
        $services = $this->services_model;
        $validation = $this->form_validation;
        $validation->set_rules($services->rules());
        if ($validation->run()) {
            $services->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/services_add");
    }

    public function edit($id_services = null)
    {
        if (!isset($id_services)) redirect('admin/services');
       
        $services = $this->services_model;
        $validation = $this->form_validation;
        $validation->set_rules($services->rules());

        if ($validation->run()) {
            $services->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["services"] = $services->getById($id_services);
        if (!$data["services"]) show_404();
        
        $this->load->view("admin/services_edit", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->services_model->delete($id)) {
            redirect(site_url('admin/services'));
        }
    }
}
