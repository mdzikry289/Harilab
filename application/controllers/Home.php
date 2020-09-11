<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/team_model');
		$this->load->model('admin/client_model');
		$this->load->model('admin/proyek_model');
	}

	public function index()
	{
		$data["team"] = $this->team_model->getAll();
		$data["client"] = $this->client_model->getAll();
		$data["proyek"] = $this->proyek_model->getAll();
		$this->load->view('home', $data);
	}
}
