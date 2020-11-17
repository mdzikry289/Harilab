<?php defined('BASEPATH') or exit('No direct script access allowed');

class Contact_model extends CI_Model
{
    private $_table = "tb_banner";

    public $id_contact;
    public $alamat_short;
    public $alamat_long;
    public $no_tlp1;
    public $no_tlp2;
    public $email;
    public $twitter;
    public $fb;
    public $instagram;

    public function rules()
    {
        return [
            [
                'field' => 'alamat_short',
                'label' => 'Alamat',
                'rules' => 'required'
            ],

            [
                'field' => 'alamat_long',
                'label' => 'Alamat Lengkap',
                'rules' => 'required'
            ],

            [
                'field' => 'no_tlp',
                'label' => 'Nomor Telepon',
                'rules' => 'required'
            ],

            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required'
            ],

        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_settings" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->alamat_short = $post["alamat_short"];
        $this->alamat_long = $post["alamat_long"];
        $this->no_tlp = $post["no_tlp"];
        $this->email = $post["email"];
        $this->twitter = $post['twitter'];
        $this->fb = $post['fb'];
        $this->instagram = $post['instagram'];
        // $this->image_banner = $this->_uploadImage();
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_contact = $post["id_contact"];
        $this->alamat_short = $post["alamat_short"];
        $this->alamat_long = $post["alamat_long"];
        $this->no_tlp = $post["no_tlp"];
        $this->email = $post["email"];
        // if (!empty($_FILES["image_banner"]["name"])) {
        //     $this->image_banner = $this->_uploadImage();
        // } else {
        //     $this->image_banner = $post["old_image"];
        // }
        $this->db->update($this->_table, $this, array('id_settings' => $post['id_settings']));
    }

    // public function delete($id)
    // {
    //     $this->_deleteImage($id);
    //     return $this->db->delete($this->_table, array("id_settings" => $id));
    // }

    private function _uploadImage()
    {
        $config['upload_path']          = './assets-frontend/img/orig/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $this->image_banner;
        $config['overwrite']            = true;
        $config['max_size']             = 15375; // 15MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image_banner')) {
            $gbr = $this->upload->data();
            //Compress Image
            $config['image_library'] = 'gd2';
            $config['source_image'] = './assets-frontend/img/orig/' . $gbr['file_name'];
            $config['create_thumb'] = FALSE;
            $config['maintain_ratio'] = FALSE;
            $config['quality'] = '75%';
            $config['width'] = 1800;
            $config['height'] = 900;
            $config['new_image'] = './assets-frontend/img/' . $gbr['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();

            return $gbr['file_name'];
            // return $this->upload->data("file_name");
        }
        // print_r($this->upload->display_errors());
        return "default.jpg";
    }

    private function _deleteImage($id)
    {

        $banner = $this->getById($id);
        if ($banner->image_banner != "default.jpg") {
            $filename = explode(".", $banner->image_banner)[0];
            return array_map('unlink', glob(FCPATH . "/assets-frontend/assets/img/orig/$filename.*"));
            return array_map('unlink', glob(FCPATH . "/assets-frontend/assets/img/$filename.*"));
        }
        return "default.jpg";
    }
}