<?php defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    private $_table = "tb_users";

    public $id_user;
    public $nama_user;
    public $username;
    public $password;
    public $old_pass;
    public $new_pass;
    public $level;
    public $image = "default.jpg";

    public function rules()
    {
        return [
            [
                'field' => 'nama_user',
                'label' => 'Nama User',
                'rules' => 'required'
            ],

            [
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required'
            ],

            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required'
            ]
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id_user)
    {
        return $this->db->get_where($this->_table, ["id_user" => $id_user])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->nama_user = $post["nama_user"];
        $this->username = $post["username"];
        $this->password = $post["password"];
        $this->level = $post["level"];
        $this->image = $this->_uploadImage();
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_anggota = $post["id_user"];
        $this->nama_user = $post["nama_user"];
        $this->username = $post["username"];
        $this->password = $post["password"];
        if($this->old_pass != $this->old_pass_verify){
            $this->session->set_flashdata('error', 'Password lama salah.');
        }
        $this->level = $post["level"];
        if (!empty($_FILES["image"]["name"])) {
            $this->image = $this->_uploadImage();
        } else {
            $this->image = $post["old_image"];
        }
        $this->db->update($this->_table, $this, array('id_user' => $post['id_user']));
    }

    public function delete($id_user)
    {
        $this->_deleteImage($id_user);
        return $this->db->delete($this->_table, array("id_user" => $id_user));
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './uploads/user_img/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $this->id_user;
        $config['overwrite']            = true;
        $config['max_size']             = 15375; // 15MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='./uploads/user_img/'.$gbr['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= FALSE;
                $config['quality']= '75%';
                $config['width']= 600;
                $config['height']= 480;
                $config['new_image']= './uploads/user_img/thumbs/'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
 
                return $gbr['file_name'];
            // return $this->upload->data("file_name");
        }
        // print_r($this->upload->display_errors());
        return "default.jpg";
    }

    private function _deleteImage($id_user)
    {

        $user = $this->getById($id_user);
        if ($user->image != "default.jpg") {
            $filename = explode(".", $user->image)[0];
            return array_map('unlink', glob(FCPATH . "uploads/user_img/$filename.*"));
            return array_map('unlink', glob(FCPATH . "uploads/user_img/thumbs/$filename.*"));
        }
    }
}
