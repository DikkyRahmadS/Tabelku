<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('Menu_model');
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		$data['title'] = "Menu Management";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['menu'] = $this->db->get('user_menu')->result_array();
		$this->form_validation->set_rules('menu', 'Menu', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('layouts/header', $data);
			$this->load->view('layouts/sidebar', $data);
			$this->load->view('layouts/topbar', $data);
			$this->load->view('menu/index', $data);
			$this->load->view('layouts/footer');
		} else {
			$this->db->insert('user_menu', ['menu' => $this->input->post('menu'), 'active' => $this->input->post('active')]);
			$this->session->set_flashdata('success', 'Menu Added!');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				New Menu Added!
				</div>');
			redirect('menu');
		}
	}
	public function subMenu()
	{
		$data['title'] = "Submenu Management";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['subMenu'] = $this->Menu_model->getSubMenu();
		$data['menu'] = $this->db->get('user_menu')->result_array();
		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('menu_id', 'Menu_id', 'trim|required');
		$this->form_validation->set_rules('url', 'URL', 'trim|required');
		$this->form_validation->set_rules('icon', 'Icon', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('layouts/header', $data);
			$this->load->view('layouts/sidebar', $data);
			$this->load->view('layouts/topbar', $data);
			$this->load->view('menu/submenu', $data);
			$this->load->view('layouts/footer');
		} else {
			$data = [
				'title' => $this->input->post('title'),
				'menu_id' => $this->input->post('menu_id'),
				'url' => $this->input->post('url'),
				'icon' => $this->input->post('icon'),
				'is_active' => $this->input->post('is_active')
			];
			$this->db->insert('user_sub_menu', $data);
			$this->session->set_flashdata('success', 'Sub Menu Added!');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				New Sub Menu Added!
				</div>');
			redirect('menu/subMenu/');
		}
	}

	public function getUpdateMenu()
	{
		echo json_encode($this->Menu_model->getMenuById($this->input->post('id')));
	}
	public function updateMenu()
	{
		$this->form_validation->set_rules('menu', 'Menu', 'trim|required');
		if ($this->form_validation->run() == false) {
			redirect('menu/');
		} else {
			$data = array(
				'menu' => $this->input->post('menu'),
				'active' => $this->input->post('active')
			);
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('user_menu', $data);
			$this->session->set_flashdata('success', 'Menu Updated!');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Menu Updated!
				</div>');
			redirect('menu/');
		}
	}

	public function getUpdateSubMenu()
	{
		echo json_encode($this->Menu_model->getSubMenuById($this->input->post('id')));
	}

	public function updateSubMenu()
	{
		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('menu_id', 'Menu_id', 'trim|required');
		$this->form_validation->set_rules('url', 'URL', 'trim|required');
		$this->form_validation->set_rules('icon', 'Icon', 'trim|required');
		if ($this->form_validation->run() == false) {
			redirect('menu/subMenu');
		} else {
			$data = [
				'title' => $this->input->post('title'),
				'menu_id' => $this->input->post('menu_id'),
				'url' => $this->input->post('url'),
				'icon' => $this->input->post('icon'),
				'is_active' => $this->input->post('is_active')
			];
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('user_sub_menu', $data);
			$this->session->set_flashdata('success', 'Sub Menu Updated!');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Sub Menu Updated!
				</div>');
			redirect('menu/subMenu');
		}
	}

	public function deleteMenu($id)
	{
		$this->db->where('menu_id', $id);
		$this->db->delete('user_sub_menu');

		$this->db->where('menu_id', $id);
		$this->db->delete('user_access_menu');

		$this->db->where('id', $id);
		$this->db->delete('user_menu');
		$this->session->set_flashdata('success', 'Menu Deleted!');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Menu Deleted!
			</div>');
		redirect('menu/');
	}

	public function deleteSubMenu($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('user_sub_menu');
		$this->session->set_flashdata('success', 'Sub Menu Deleted!');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Sub Menu Deleted!
			</div>');
		redirect('menu/subMenu');
	}
}
