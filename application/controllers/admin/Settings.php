<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Settings extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //load model
        $this->load->model("admin/settings_model");
        $this->load->model("login_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        //cek session
        if ($this->login_model->logged_id()) {
            $settings = $this->settings_model;
            $validation = $this->form_validation;
            $validation->set_rules($settings->rules());

            if ($validation->run()) {
                $settings->update();
                $this->session->set_flashdata('success', 'Berhasil disimpan');
            }

            $data["settings"] = $settings->getByID(1);
            if (!$data["settings"]) show_404();

            $this->load->view("admin/settings_edit", $data);
        } else {
            //jika tidak ada session maka redirect ke halaman login
            redirect("login");
        }
    }

    // public function add()
    // {
    //     $cat = $this->banner_model;
    //     $validation = $this->form_validation;
    //     $validation->set_rules($cat->rules());
    //     if ($validation->run()) {
    //         $cat->save();
    //         $this->session->set_flashdata('success', 'Berhasil disimpan');
    //     }

    //     $this->load->view("admin/banner_add");
    // }

    public function edit($id = null)
    {
        // if (!isset($id)) redirect('admin/settings');

        $settings = $this->settings_model;
        $validation = $this->form_validation;
        $validation->set_rules($settings->rules());

        if ($validation->run()) {
            $settings->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["settings"] = $settings->getByID($id);
        if (!$data["settings"]) show_404();

        $this->load->view("admin/settings_edit", $data);
    }

    // public function delete($id = null)
    // {
    //     if (!isset($id)) show_404();

    //     if ($this->banner_model->delete($id)) {
    //         redirect(site_url('admin/banner'));
    //     }
    // }
}
