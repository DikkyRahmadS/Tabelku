<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tampilan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $data['title'] = "Pengaturan Tema";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['warnas'] = $this->db->get('warna')->result_array();
        $data['font_families'] = $this->db->get('font_family')->result_array();
        $data['tampilan'] = $this->db->get_where('tampilan', ['id' => 1])->row_array();
        
        $this->form_validation->set_rules('warna_skema', 'Warna Skema', 'trim|required');
        $this->form_validation->set_rules('warna_soft', 'Warna Soft', 'trim|required');
        $this->form_validation->set_rules('warna_latar', 'Warna Latar', 'trim|required');
        $this->form_validation->set_rules('warna_sidebar', 'Warna Sidebar', 'trim|required');
        $this->form_validation->set_rules('warna_topbar', 'Warna Topbar', 'trim|required');
        $this->form_validation->set_rules('jenis_font', 'Jenis Font', 'required');
        $this->form_validation->set_rules('ukuran_font', 'Ukuran Font', 'trim|required');
        $this->form_validation->set_rules('warna_font', 'Warna Font Tertentu', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('layouts/header', $data);
            $this->load->view('layouts/sidebar', $data);
            $this->load->view('layouts/topbar', $data);
            $this->load->view('app/tampilan', $data);
            $this->load->view('layouts/footer');
        } else {
            $data = array(
                'warna_skema' => $this->input->post('warna_skema'),
                'warna_soft' => $this->input->post('warna_soft'),
                'warna_latar' => $this->input->post('warna_latar'),
                'warna_sidebar' => $this->input->post('warna_sidebar'),
                'warna_topbar' => $this->input->post('warna_topbar'),
                'jenis_font' => $this->input->post('jenis_font'),
                'ukuran_font' => $this->input->post('ukuran_font'),
                'warna_font' => $this->input->post('warna_font'),
            );

            $this->db->where('id', $this->input->post('id'));
            $this->db->update('tampilan', $data);
            $this->session->set_flashdata('success', 'tampilan diperbarui!');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            tampilan diperbarui!
                </div>');


            // redirect('admin/role');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
}
