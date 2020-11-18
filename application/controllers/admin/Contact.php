<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //load model
        $this->load->model("admin/contact_model");
        $this->load->model("admin/settings_model");
        $this->load->model("login_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        //cek session
        if ($this->login_model->logged_id()) {
            $contact = $this->contact_model;
            $validation = $this->form_validation;
            $validation->set_rules($contact->rules());

            if ($validation->run()) {
                $contact->update();
                $this->session->set_flashdata('success', 'Berhasil disimpan');
            }
            $data["settings"] = $this->settings_model->getAll();
            $data["contact"] = $contact->getByID(1);
            if (!$data["contact"]) show_404();

            $this->load->view("admin/contact_edit", $data);
        } else {
            //jika tidak ada session maka redirect ke halaman login
            redirect("login");
        }
    }

    // public function add()
    // {
    //     $contact = $this->contact_model;
    //     $validation = $this->form_validation;
    //     $validation->set_rules($contact->rules());
    //     if ($validation->run()) {
    //         $contact->save();
    //         $this->session->set_flashdata('success', 'Berhasil disimpan');
    //     }

    //     $this->load->view("admin/kategori_add");
    // }

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
