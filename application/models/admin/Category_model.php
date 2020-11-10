<?php defined('BASEPATH') or exit('No direct script access allowed');

class Category_model extends CI_Model
{
    private $_table = "tb_kategori";

    public $id_kategori;
    public $nama_kategori;
    public $image_kategori = "default.jpg";

    public function rules()
    {
        return [
            [
            'field' => 'nama_kategori',
            'label' => 'Nama Kategori',
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
        return $this->db->get_where($this->_table, ["id_kategori" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->nama_kategori = $post["nama_kategori"];
        $this->image_kategori = $this->_uploadImage();
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_kategori = $post["id_kategori"];
        $this->nama_kategori = $post["nama_kategori"];
        if (!empty($_FILES["image_kategori"]["name"])) {
            $this->image_kategori = $this->_uploadImage();
        } else {
            $this->image_kategori = $post["old_image"];
        }
        $this->db->update($this->_table, $this, array('id_kategori' => $post['id_kategori']));
    }

    public function delete($id)
    {
        $this->_deleteImage($id);
        return $this->db->delete($this->_table, array("id_kategori" => $id));
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './uploads/kategori_img/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $this->id_kategori;
        $config['overwrite']            = true;
        $config['max_size']             = 15375; // 15MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image_kategori')) {
            $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='./uploads/kategori_img/'.$gbr['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= FALSE;
                $config['quality']= '75%';
                $config['width']= 600;
                $config['height']= 480;
                $config['new_image']= './uploads/kategori_img/thumbs/'.$gbr['file_name'];
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

        $cat = $this->getById($id);
        if ($cat->image_kategori != "default.jpg") {
            $filename = explode(".", $cat->image_kategori)[0];
            return array_map('unlink', glob(FCPATH . "uploads/kategori_img/$filename.*"));
            return array_map('unlink', glob(FCPATH . "uploads/kategori_img/thumbs/$filename.*"));
        }
        return "default.jpg";
    }
}
