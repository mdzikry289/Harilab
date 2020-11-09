<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model
        $this->load->model("admin/team_model");
        $this->load->model("login_model");
        $this->load->model("admin/jabatan_model");
        $this->load->model("admin/user_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        if($this->login_model->logged_id()){
            $data["team"] = $this->team_model->getByJoin();
            $this->load->view("admin/list_team", $data);
        } else {
            redirect("login");
        }

    }

    public function add()
    {
        $team = $this->team_model;
        $jabatan = $this->jabatan_model;
        $user = $this->user_model;
        $validation = $this->form_validation;
        $validation->set_rules($team->rules());
        if ($validation->run()) {
            $team->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $data["team"] = $team->getAll();
        $data["jabatan"] = $jabatan->getAll();
        $data["user"] = $user->getAll();
        $this->load->view("admin/team_add", $data);
    }

    public function edit($id_team = null)
    {
        if (!isset($id_team)) redirect('admin/team');
       
        $team = $this->team_model;
        $jabatan = $this->jabatan_model;
        $user = $this->user_model;
        $validation = $this->form_validation;
        $validation->set_rules($team->rules());

        if ($validation->run()) {
            $team->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["team"] = $team->getById($id_team);
        $data["jabatan"] = $jabatan->getAll();
        $data["user"] = $user->getAll();
        if (!$data["team"]) show_404();
        
        $this->load->view("admin/team_edit", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->team_model->delete($id)) {
            redirect(site_url('admin/team'));
        }
    }
}
