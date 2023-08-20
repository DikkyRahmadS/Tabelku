<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		is_logged_in();
		$this->load->model('Admin_model');
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		$data['title'] = "Dashboard";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('layouts/header', $data);
		$this->load->view('layouts/sidebar', $data);
		$this->load->view('layouts/topbar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('layouts/footer');
	}

	public function role()
	{
		$data['title'] = "Role Management";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get('user_role')->result_array();
		$this->form_validation->set_rules('role', 'Role', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('layouts/header', $data);
			$this->load->view('layouts/sidebar', $data);
			$this->load->view('layouts/topbar', $data);
			$this->load->view('admin/role', $data);
			$this->load->view('layouts/footer');
		} else{
			$this->db->insert('user_role', ['role' => $this->input->post('role')]);

			$this->session->set_flashdata('success', 'Role Added!');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				New Role Added!
				</div>');
			redirect('admin/role');
		}
	}

	public function dataUser()
	{
		$data['title'] = "Data User";
		$data['role'] = $this->db->get('user_role')->result_array();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->db->select('*, user_role.id AS rid, user.id AS uid');
		$this->db->from('user');
		$this->db->join('user_role', 'user_role.id = user.role_id');
		$this->db->where('user.id !=', 0);
		$this->db->where('user.role_id = ',1);
		$this->db->or_where('user.role_id = ', 2);
		$data['user_data'] = $this->db->get()->result_array();

		$this->form_validation->set_rules('name', 'Name', 'required|trim');

		
		if ($this->input->post('aksi') == "add") {
			$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
				'is_unique' => 'this email has already registered!'
			]);
			$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
				'is_unique' => 'this Username has already registered!'
			]);
		} elseif ($this->input->post('aksi') == "update") {
			$cekuser = $this->db->get_where('user', ['id' => $this->input->post('id')])->row();
			if ($cekuser->email !== $this->input->post('email')) {
				$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
					'is_unique' => 'this email has already registered!'
				]);
			} else {
				$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
			}
			if ($cekuser->username !== $this->input->post('username')) {
				$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
					'is_unique' => 'this Username has already registered!'
				]);
			} else {
				$this->form_validation->set_rules('username', 'Username', 'required|trim');
			}

		}
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]', [
			'matches' => 'password dont match!',
			'min_length' => 'password too short!'
		]);
		// $this->form_validation->set_rules('role_id','Role', 'required|trim');
		$this->form_validation->set_rules('gender', 'Gander', 'required|trim');
		$this->form_validation->set_rules('birthday', 'Birth Day', 'required|trim');
		$this->form_validation->set_rules('phone_number', 'Phone Number', 'required|trim');
		$this->form_validation->set_rules('address', 'Address', 'required|trim');
		// 
		$this->form_validation->set_rules('password2', 'Confrim Password', 'required|trim|matches[password1]');
		if ($this->form_validation->run() == false) {
			$this->load->view('layouts/header', $data);
			$this->load->view('layouts/sidebar', $data);
			$this->load->view('layouts/topbar', $data);
			$this->load->view('admin/data-user', $data);
			$this->load->view('layouts/footer');
		} else {
			if ($this->input->post('aksi') == "add") {
				$data = [
					'name' => htmlspecialchars($this->input->post('name', true)),
					'email' => htmlspecialchars($this->input->post('email', true)),
					'username' => htmlspecialchars($this->input->post('username', true)),
					'gender' => htmlspecialchars($this->input->post('gender', true)),
					'birthday' => htmlspecialchars($this->input->post('birthday', true)),
					'phone_number' => htmlspecialchars($this->input->post('phone_number', true)),
					'address' => htmlspecialchars($this->input->post('address', true)),
					'image' => 'profile/default.png',
					'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
					// 'role_id' => htmlspecialchars($this->input->post('role_id', true)),
					'role_id' => htmlspecialchars($this->input->post('role_id', true)),
					'is_active' => 1,
					// 'is_active' => 0,
					'date_created' => time(),
				];
				$this->db->insert('user', $data);

				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Data Users telah disimpan!
                    </div>');
				$this->session->set_flashdata('success', 'Data Users telah disimpan!!');
			} elseif ($this->input->post('aksi') == "update") {
				$data = [
					'name' => htmlspecialchars($this->input->post('name', true)),
					'email' => htmlspecialchars($this->input->post('email', true)),
					'username' => htmlspecialchars($this->input->post('username', true)),
					'gender' => htmlspecialchars($this->input->post('gender', true)),
					'birthday' => htmlspecialchars($this->input->post('birthday', true)),
					'phone_number' => htmlspecialchars($this->input->post('phone_number', true)),
					'address' => htmlspecialchars($this->input->post('address', true)),
					'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
					'role_id' => htmlspecialchars($this->input->post('role_id', true)),
				];
				$this->db->where('id', $this->input->post('id'));
				$this->db->update('user', $data);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Data User berhasil diperbarui!
                    </div>');
				$this->session->set_flashdata('success', 'Data user berhasil diperbarui!');
			}
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function deleteUser($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('user');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        data user berhasil dihapus!
			</div>');
		$this->session->set_flashdata('flash', 'data user berhasil dihapus!');

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function setRole()
	{
		$this->db->set('role_id', $this->input->post('role_id'));
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('user');

		$this->session->set_flashdata('success', 'Set User Role successfull!');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Set User Role Successfull!
			</div>');
		redirect('admin/dataUser');
	}

	public function roleAccess($role_id)
	{
		$data['title'] = "Role Access";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();
		$this->db->where('id !=', 1);
		$data['menu'] = $this->db->get('user_menu')->result_array();
		$this->load->view('layouts/header', $data);
		$this->load->view('layouts/sidebar', $data);
		$this->load->view('layouts/topbar', $data);
		$this->load->view('admin/role-access', $data);
		$this->load->view('layouts/footer');
	}

	public function changeAccess()
	{
		$menu_id = $this->input->post('menuId');
		$role_id = $this->input->post('roleId');

		$data = [
			'role_id' => $role_id,
			'menu_id' => $menu_id
		];

		$result = $this->db->get_where('user_access_menu', $data);

		if ($result->num_rows() < 1) {
			$this->db->insert('user_access_menu', $data);
		} else{
			$this->db->delete('user_access_menu', $data);
		}

		$this->session->set_flashdata('success', 'Access Changed!');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Access Changed!
			</div>');
	}

	public function getUpdateRole(){
		echo json_encode($this->Admin_model->getRoleById($this->input->post('id')));
	}
	public function getUserData(){
		echo json_encode($this->Admin_model->getUserById($this->input->post('id')));
	}
	public function updateRole(){
		$this->form_validation->set_rules('role', 'Role', 'trim|required');
		if ($this->form_validation->run() == false) {
			redirect('admin/role');
		} else{
			$data = array('role' => $this->input->post('role'));
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('user_role', $data);

			$this->session->set_flashdata('success', 'Role Updated!');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Role Updated!
				</div>');
			redirect('admin/role');
		}
	}

	public function deleteRole($id)
	{
		$this->db->where('role_id', $id);
		$this->db->delete('user');

		$this->db->where('role_id', $id);
		$this->db->delete('user_access_menu');
		
		$this->db->where('id', $id);
		$this->db->delete('user_role');

		$this->session->set_flashdata('success', 'Role Deleted!');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Role Deleted!
			</div>');
		redirect('admin/role');
	}

}
