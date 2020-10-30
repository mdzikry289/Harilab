<?php defined('BASEPATH') or exit('No direct script access allowed');

class Client_model extends CI_Model
{
    private $_table = "tb_client";
    public $id_client;
    public $nama;
    public $image = "default.jpg";

    public function rules()
    {
        return [
            [
                'field' => 'nama',
                'label' => 'Nama Client',
                'rules' => 'required'
            ],


        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id_client)
    {
        return $this->db->get_where($this->_table, ["id_client" => $id_client])->row();
    }

    public function hitungJumlahClient()
    {
        $query = $this->db->get('tb_client');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_client = uniqid();
        $this->nama = $post["nama"];
        $this->image = $this->_uploadImage();
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_client = $post["id_client"];
        $this->nama = $post["nama"];
        if (!empty($_FILES["image"]["name"])) {
            $this->image = $this->_uploadImage();
        } else {
            $this->image = $post["old_image"];
        }
        $this->db->update($this->_table, $this, array('id_client' => $post['id_client']));
    }

    public function delete($id_client)
    {
        $this->_deleteImage($id_client);
        return $this->db->delete($this->_table, array("id_client" => $id_client));
    }

    // private function _uploadImage()
    // {
    //     $config['upload_path']          = './uploads/client_img/';
    //     $config['allowed_types']        = 'gif|jpg|png';
    //     $config['file_name']            = $this->id_client;
    //     $config['overwrite']            = true;
    //     $config['max_size']             = 1024; // 1MB
    //     // $config['max_width']            = 1024;
    //     // $config['max_height']           = 768;

    //     $this->load->library('upload', $config);

    //     if ($this->upload->do_upload('image')) {
    //         return $this->upload->data("file_name");
    //     }
    //     // print_r($this->upload->display_errors());
    //     return "default.jpg";
    // }
    private function _uploadImage()
    {
        $config['upload_path']          = './uploads/client_img/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $this->id_client;
        $config['overwrite']            = true;
        $config['max_size']             = 15375; // 15MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='./uploads/client_img/'.$gbr['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= FALSE;
                $config['quality']= '75%';
                $config['width']= 600;
                $config['height']= 480;
                $config['new_image']= './uploads/client_img/thumbs/'.$gbr['file_name'];
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

        $client = $this->getById($id);
        if ($client->image != "default.jpg") {
            $filename = explode(".", $client->image)[0];
            return array_map('unlink', glob(FCPATH . "uploads/client_img/$filename.*"));
            return array_map('unlink', glob(FCPATH . "uploads/client_img/thumbs/$filename.*"));
        }
    }
}
