<?php defined('BASEPATH') or exit('No direct script access allowed');

class Proyek_model extends CI_Model
{
    private $_table = "tb_proyek";

    public $id_proyek;
    public $nama_proyek;
    public $url;
    public $category;
    public $image = "default.jpg";

    public function rules()
    {
        return [
            [
            'field' => 'nama_proyek',
            'label' => 'Nama Proyek',
            'rules' => 'required'
            ],

            [
            'field' => 'url',
            'label' => 'Link Proyek',
            'rules' => 'required'
            ],

            [
            'field' => 'category',
            'label' => 'Kategori',
            'rules' => 'required'
            ]
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id_proyek)
    {
        return $this->db->get_where($this->_table, ["id_proyek" => $id_proyek])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_proyek = uniqid();
        $this->nama_proyek = $post["nama_proyek"];
        $this->url = $post["url"];
        $this->category = $post["category"];
        $this->image = $this->_uploadImage();
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_proyek = $post["id_proyek"];
        $this->nama_proyek = $post["nama_proyek"];
        $this->url = $post["url"];
        $this->category = $post["category"];
        if (!empty($_FILES["image"]["name"])) {
            $this->image = $this->_uploadImage();
        } else {
            $this->image = $post["old_image"];
        }
        $this->db->update($this->_table, $this, array('id_proyek' => $post['id_proyek']));
    }

    public function delete($id_proyek)
    {
        $this->_deleteImage($id_proyek);
        return $this->db->delete($this->_table, array("id_proyek" => $id_proyek));
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './uploads/proyek_img/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $this->id_proyek;
        $config['overwrite']            = true;
        $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='./uploads/proyek_img/'.$gbr['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= FALSE;
                $config['quality']= '75%';
                $config['width']= 600;
                $config['height']= 480;
                $config['new_image']= './uploads/proyek_img/thumbs/'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
 
                return $gbr['file_name'];
            // return $this->upload->data("file_name");
        }
        // print_r($this->upload->display_errors());
        return "default.jpg";
    }

    private function _deleteImage($id_proyek)
    {

        $proyek = $this->getById($id_proyek);
        if ($proyek->image != "default.jpg") {
            $filename = explode(".", $proyek->image)[0];
            return array_map('unlink', glob(FCPATH . "uploads/proyek_img/$filename.*"));
            return array_map('unlink', glob(FCPATH . "uploads/proyek_img/thumbs/$filename.*"));
        }
    }
}
