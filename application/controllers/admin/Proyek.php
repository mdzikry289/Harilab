<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Proyek extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //load model
        $this->load->model("login_model");
        $this->load->model("admin/proyek_model");
        $this->load->model("admin/category_model");
        $this->load->model("admin/team_model");
        $this->load->model("admin/client_model");
        $this->load->model("admin/settings_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        //cek session
        if ($this->login_model->logged_id()) {
            $data["proyek"] = $this->proyek_model->getByJoin();
            $data["settings"] = $this->settings_model->getAll();
            $this->load->view("admin/list_proyek", $data);
        } else {
            //jika tidak ada session maka redirect ke halaman login
            redirect("login");
        }
    }

    public function add()
    {
        $proyek = $this->proyek_model;
        $client = $this->client_model;
        $team = $this->team_model;
        $validation = $this->form_validation;
        $validation->set_rules($proyek->rules());
        if ($validation->run()) {
            $proyek->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["kategori"] = $this->category_model->getAll();
        $data["settings"] = $this->settings_model->getAll();
        $data["client"] = $client->getAll();
        $data["team"] = $team->getByJoin();
        $this->load->view("admin/proyek_add", $data);
    }

    public function edit($id_proyek = null)
    {
        if (!isset($id_proyek)) redirect('admin/proyek');

        $proyek = $this->proyek_model;
        $kategori = $this->category_model;
        $client = $this->client_model;
        $team = $this->team_model;
        $validation = $this->form_validation;
        $validation->set_rules($proyek->rules());

        if ($validation->run()) {
            $proyek->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["proyek"] = $proyek->getByJoinID($id_proyek);
        $data["kategori"] = $kategori->getAll();
        $data["client"] = $client->getAll();
        $data["team"] = $team->getAll();
        $data["settings"] = $this->settings_model->getAll();
        if (!$data["proyek"]) show_404();

        $this->load->view("admin/proyek_edit", $data);
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->proyek_model->delete($id)) {
            redirect(site_url('admin/proyek'));
        }
    }
}
