<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Avatar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $data['title'] = "avatar";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['avatars'] = $this->db->get('avatar')->result_array();

        $this->form_validation->set_rules('name', 'Name', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('layouts/header', $data);
            $this->load->view('layouts/sidebar', $data);
            $this->load->view('layouts/topbar', $data);
            $this->load->view('app/avatar', $data);
            $this->load->view('layouts/footer');
        } else {

            if ($this->input->post('aksi') == "add") {
                $this->db->insert('avatar', [
                    'name' => $this->input->post('name'),
                    'avatar' => $this->input->post('avatar')
                ]);
                $this->session->set_flashdata('success', 'Avatar Added!');

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    New Avatar Added!
                    </div>');
            } elseif ($this->input->post('aksi') == "update") {
                $upload_avatar = $_FILES['avatar']['name'];
                if ($upload_avatar) {
                    $config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
                    $config['upload_path'] = './assets/img/avatar';
                    $config['max_size']     = '4096';

                    // Generate random file name
                    $config['file_name'] = uniqid();
                    $this->load->library('upload', $config);
                    if ($this->upload->do_upload('avatar')) {
                        $new_avatar = $this->upload->data('file_name');
                        $this->db->set('avatar', 'avatar/' . $new_avatar);
                    } else {
                        $this->session->set_flashdata('error', $this->upload->display_errors());
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                        redirect($_SERVER['HTTP_REFERER']);
                    }
                }

                $data = array(
                    'name' => $this->input->post('name')
                );

                $this->db->where('id', $this->input->post('id'));
                $this->db->update('avatar', $data);
                $this->session->set_flashdata('success', 'Avatar Updated!');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                avatar Updated!
                    </div>');
            }


            // redirect('admin/role');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('avatar');

        $this->session->set_flashdata('success', 'Avatar Deleted!');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        avatar Deleted!
			</div>');

        redirect($_SERVER['HTTP_REFERER']);
    }
}
