<?php defined('BASEPATH') or exit('No direct script access allowed');

class Team_model extends CI_Model
{
    private $_table = "tb_team";

    public $id_anggota;
    public $nama_anggota;
    public $id_jabatan;
    public $instagram;
    public $twitter;
    public $fb;
    public $linkedin;
    public $image_team = "default.jpg";

    public function rules()
    {
        return [
            [
                'field' => 'nama_anggota',
                'label' => 'Nama Anggota',
                'rules' => 'required'
            ],
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id_anggota)
    {
        $this->db->join('tb_jabatan', 'tb_jabatan.id_jabatan = tb_team.id_jabatan', 'left');
        return $this->db->get_where($this->_table, ["id_anggota" => $id_anggota])->row();
    }

    public function hitungJumlahTeam()
    {
        $query = $this->db->get('tb_team');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    function getByJoin()
    {
        $this->db->select('*');
        $this->db->from('tb_team');
        $this->db->join('tb_jabatan', 'tb_jabatan.id_jabatan = tb_team.id_jabatan', 'left');
        $query = $this->db->get();
        return $query->result();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->nama_anggota = $post["nama_anggota"];
        $this->jabatan = $post["jabatan"];
        if (!empty($post["instagram"])) {
            $this->instagram = $post["instagram"];
        } else {
            $this->instagram = "#";
        }
        if (!empty($post["twitter"])) {
            $this->twitter = $post["twitter"];
        } else {
            $this->twitter = "#";
        }
        if (!empty($post["fb"])) {
            $this->fb = $post["fb"];
        } else {
            $this->fb = "#";
        }
        if (!empty($post["linkedin"])) {
            $this->linkedin = $post["linkedin"];
        } else {
            $this->linkedin = "#";
        }
        $this->image_team = $this->_uploadImage();
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_anggota = $post["id_anggota"];
        $this->nama_anggota = $post["nama_anggota"];
        $this->id_jabatan = $post["id_jabatan"];
        if (!empty($post["instagram"])) {
            $this->instagram = $post["instagram"];
        } else {
            $this->instagram = "#";
        }
        if (!empty($post["twitter"])) {
            $this->twitter = $post["twitter"];
        } else {
            $this->twitter = "#";
        }
        if (!empty($post["fb"])) {
            $this->fb = $post["fb"];
        } else {
            $this->fb = "#";
        }
        if (!empty($post["linkedin"])) {
            $this->linkedin = $post["linkedin"];
        } else {
            $this->linkedin = "#";
        }
        if (!empty($_FILES["image"]["name"])) {
            $this->image_team = $this->_uploadImage();
        } else {
            $this->image_team = $post["old_image"];
        }
        $this->db->update($this->_table, $this, array('id_anggota' => $post['id_anggota']));
    }

    public function delete($id_anggota)
    {
        $this->_deleteImage($id_anggota);
        return $this->db->delete($this->_table, array("id_anggota" => $id_anggota));
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './uploads/team_img/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $this->id_anggota;
        $config['overwrite']            = true;
        $config['max_size']             = 15375; // 15MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            $gbr = $this->upload->data();
            //Compress Image
            $config['image_library'] = 'gd2';
            $config['source_image'] = './uploads/team_img/' . $gbr['file_name'];
            $config['create_thumb'] = FALSE;
            $config['maintain_ratio'] = FALSE;
            $config['quality'] = '75%';
            $config['width'] = 600;
            $config['height'] = 480;
            $config['new_image'] = './uploads/team_img/thumbs/' . $gbr['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();

            return $gbr['file_name'];
            // return $this->upload->data("file_name");
        }
        // print_r($this->upload->display_errors());
        return "default.jpg";
    }

    private function _deleteImage($id_anggota)
    {

        $team = $this->getById($id_anggota);
        if ($team->image_team != "default.jpg") {
            $filename = explode(".", $team->image_team)[0];
            return array_map('unlink', glob(FCPATH . "uploads/team_img/$filename.*"));
            return array_map('unlink', glob(FCPATH . "uploads/team_img/thumbs/$filename.*"));
        }
    }
}
