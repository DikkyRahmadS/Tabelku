<?php
defined('BASEPATH') or exit('No direct script access allowed');

class App extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $data['title'] = "Pengaturan Website";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['warnas'] = $this->db->get('warna')->result_array();
        $data['app'] = $this->db->get_where('app', ['id' => 1])->row_array();
        $this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
        $this->form_validation->set_rules('warna_button', 'warna tombol', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('layouts/header', $data);
            $this->load->view('layouts/sidebar', $data);
            $this->load->view('layouts/topbar', $data);
            $this->load->view('app/app', $data);
            $this->load->view('layouts/footer');
        } else {
            $upload_logo = $_FILES['logo']['name'];
            if ($upload_logo) {
                $config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
                $config['upload_path'] = './assets/img/app';
                $config['max_size']     = '4096';

                // Generate random file name
                $config['file_name'] = uniqid();
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('logo')) {
                    $new_logo = $this->upload->data('file_name');
                    $this->db->set('logo', 'app/' . $new_logo);
                } else {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect($_SERVER['HTTP_REFERER']);
                }
            }

            $data = array(
                'deskripsi' => $this->input->post('deskripsi'),
                'warna_button' => $this->input->post('warna_button'),
            );

            $this->db->where('id', $this->input->post('id'));
            $this->db->update('app', $data);
            $this->session->set_flashdata('success', 'app Updated!');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                app Updated!
                    </div>');

            // redirect('admin/role');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
}
