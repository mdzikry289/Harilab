<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //load model
        $this->load->model("admin/category_model");
        $this->load->model("admin/settings_model");
        $this->load->model("login_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        //cek session
        if ($this->login_model->logged_id()) {
            $data["category"] = $this->category_model->getAll();
            $data["settings"] = $this->settings_model->getAll();
            $this->load->view("admin/list_kategori", $data);
        } else {
            //jika tidak ada session maka redirect ke halaman login
            redirect("login");
        }
    }

    public function add()
    {
        $cat = $this->category_model;
        $validation = $this->form_validation;
        $validation->set_rules($cat->rules());
        if ($validation->run()) {
            $cat->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $data["settings"] = $this->settings_model->getAll();
        $this->load->view("admin/kategori_add", $data);
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/category');

        $kategori = $this->category_model;
        $validation = $this->form_validation;
        $validation->set_rules($kategori->rules());

        if ($validation->run()) {
            $kategori->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["settings"] = $this->settings_model->getAll();
        $data["kategori"] = $kategori->getById($id);
        if (!$data["kategori"]) show_404();

        $this->load->view("admin/kategori_edit", $data);
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->category_model->delete($id)) {
            redirect(site_url('admin/category'));
        }
    }

    public function deleteImage($id)
    {
        if (!isset($id)) show_404();

        if ($this->category_model->_resetImage($id)) {
            redirect(site_url('admin/category'));
        }
    }
}
