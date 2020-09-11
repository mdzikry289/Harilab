<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proyek extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin/proyek_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["proyek"] = $this->proyek_model->getAll();
        $this->load->view("admin/list_proyek", $data);
    }

    public function add()
    {
        $proyek = $this->proyek_model;
        $validation = $this->form_validation;
        $validation->set_rules($proyek->rules());
        if ($validation->run()) {
            $proyek->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/proyek_add");
    }

    public function edit($id_proyek = null)
    {
        if (!isset($id_proyek)) redirect('admin/proyek');
       
        $proyek = $this->proyek_model;
        $validation = $this->form_validation;
        $validation->set_rules($proyek->rules());

        if ($validation->run()) {
            $proyek->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["proyek"] = $proyek->getById($id_proyek);
        if (!$data["proyek"]) show_404();
        
        $this->load->view("admin/proyek_edit", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->proyek_model->delete($id)) {
            redirect(site_url('admin/proyek'));
        }
    }
}
