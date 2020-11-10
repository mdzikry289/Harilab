<?php defined('BASEPATH') or exit('No direct script access allowed');

class Jabatan_model extends CI_Model
{
    private $_table = "tb_jabatan";

    public $id_jabatan;
    public $nama_jabatan;
    // public $image_jabatan = "default.jpg";

    public function rules()
    {
        return [
            [
            'field' => 'nama_jabatan',
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
        return $this->db->get_where($this->_table, ["id_jabatan" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->nama_jabatan = $post["nama_jabatan"];
        // $this->image_jabatan = $this->_uploadImage();
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_jabatan = $post["id_jabatan"];
        $this->nama_jabatan = $post["nama_jabatan"];
        // if (!empty($_FILES["image"]["name"])) {
        //     $this->image_jabatan = $this->_uploadImage();
        // } else {
        //     $this->image_jabatan = $post["old_image"];
        // }
        $this->db->update($this->_table, $this, array('id_kategori' => $post['id_kategori']));
    }

    public function delete($id)
    {
        // $this->_deleteImage($id);
        return $this->db->delete($this->_table, array("id_kategori" => $id));
    }

    // private function _uploadImage()
    // {
    //     $config['upload_path']          = './uploads/kategori_img/';
    //     $config['allowed_types']        = 'gif|jpg|png';
    //     $config['file_name']            = $this->id_kategori;
    //     $config['overwrite']            = true;
    //     $config['max_size']             = 15375; // 15MB
    //     // $config['max_width']            = 1024;
    //     // $config['max_height']           = 768;

    //     $this->load->library('upload', $config);

    //     if ($this->upload->do_upload('image')) {
    //         $gbr = $this->upload->data();
    //             //Compress Image
    //             $config['image_library']='gd2';
    //             $config['source_image']='./uploads/jabatan_img/'.$gbr['file_name'];
    //             $config['create_thumb']= FALSE;
    //             $config['maintain_ratio']= FALSE;
    //             $config['quality']= '75%';
    //             $config['width']= 600;
    //             $config['height']= 480;
    //             $config['new_image']= './uploads/jabatan_img/thumbs/'.$gbr['file_name'];
    //             $this->load->library('image_lib', $config);
    //             $this->image_lib->resize();
 
    //             return $gbr['file_name'];
    //         // return $this->upload->data("file_name");
    //     }
    //     // print_r($this->upload->display_errors());
    //     return "default.jpg";
    // }

    // private function _deleteImage($id)
    // {

    //     $cat = $this->getById($id);
    //     if ($cat->image_jabatan != "default.jpg") {
    //         $filename = explode(".", $cat->image_jabatan)[0];
    //         return array_map('unlink', glob(FCPATH . "uploads/kategori_img/$filename.*"));
    //         return array_map('unlink', glob(FCPATH . "uploads/kategori_img/thumbs/$filename.*"));
    //     }
    //     return "default.jpg";
    // }
}
