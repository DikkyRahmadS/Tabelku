<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		$data['title'] = "Dashboard";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['data_pendapatan'] = $this->db
			->select("DATE_FORMAT(tanggal_pembelian, '%Y-%m') as bulan, SUM(total_bayar) as total_pendapatan")
			->from("pembelian")
			->group_by("DATE_FORMAT(tanggal_pembelian, '%Y-%m')")
			->get()->result();
		$data['data_kualitas'] = $this->db
			->select("DATE_FORMAT(tanggal_pembelian, '%Y-%m') as bulan, 
              SUM(CASE WHEN kualitas = 'Besar' THEN bobot ELSE 0 END) as total_bobot_besar,
              SUM(CASE WHEN kualitas = 'Kecil' THEN bobot ELSE 0 END) as total_bobot_kecil")
			->from("pembelian")
			->group_by("DATE_FORMAT(tanggal_pembelian, '%Y-%m')")
			->get()->result();
			
			//var_dump($data['data_kualitas']);
		$this->load->view('layouts/header', $data);
		$this->load->view('layouts/sidebar', $data);
		$this->load->view('layouts/topbar', $data);
		$this->load->view('user/index', $data);
		$this->load->view('layouts/footer');
	}

	public function changeAvatar()
	{
		$this->db->where('id', $this->input->post('user_id'));
		$this->db->update('user', ['image' => $this->input->post('avatar')]);
		$this->session->set_flashdata('success', 'Profile Updated!');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Profile Updated
				</div>');
		redirect('user/edit');
	}


	public function edit()
	{
		$data['title'] = "Edit Profile";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['avatars'] = $this->db->get('avatar')->result_array();
		$this->form_validation->set_rules('name', 'Full Name', 'trim|required');
		if ($this->form_validation->run() ==  false) {
			$this->load->view('layouts/header', $data);
			$this->load->view('layouts/sidebar', $data);
			$this->load->view('layouts/topbar', $data);
			$this->load->view('user/edit', $data);
			$this->load->view('layouts/footer');
		} else {
			$name = $this->input->post('name');
			$email = $this->input->post('email');
			$username = $this->input->post('username');

			//jika ada gambar
			$upload_image = $_FILES['image']['name'];
			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|png|svg';
				$config['upload_path'] = './assets/img/profile';
				$config['max_size']     = '2048';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('image')) {
					$old_image = $data['user']['image'];
					if ($old_image != 'default.jpg' || $old_image != 'default.svg' || $old_image != 'default.png') {
						// unlink(FCPATH.'assets/img/profile/'.$old_image);
					}
					$new_image = 'profile/' . $this->upload->data('file_name');
					$this->db->set('image', $new_image);
				} else {
					$this->session->set_flashdata('error', $this->upload->display_errors());
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
					redirect('user');
				}
			}

			$data = [
				'name' => $this->input->post('name'),
				'gender' => $this->input->post('gender'),
				// 'place_of_birth' => $this->input->post('place_of_birth'),
				'birthday' => $this->input->post('birthday'),
				'phone_number' => $this->input->post('phone_number'),
				'address' => $this->input->post('address')
			];
			$this->db->where('email', $email);
			$this->db->update('user', $data);
			// $this->session->set_flashdata('flash', 'Berhasil diubah');
			$this->session->set_flashdata('success', 'Profile Updated!');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Selamat! Profilmu berhasil diperbarui!
				</div>');
			redirect('user');
		}
	}

	public function delete()
	{
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() ==  false) {
			// $this->session->set_flashdata('flash_gagal', 'Kata sandi wajib diisi');
			$this->session->set_flashdata('error', 'Password is required!');
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				The Password is required.
				</div>');
			redirect('user/edit');
		} else {
			$email = $this->session->userdata('email');
			$password = $this->input->post('password');

			$user = $this->db->get_where('user', ['email' => $email])->row_array();
			$id = $user['id'];

			if (password_verify($password, $user['password'])) {
				$this->db->delete('user', ['id' => $id]);
				redirect('auth/logout');
			} else {
				$this->session->set_flashdata('flash_gagal', 'Kata Sandi salah');
				$this->session->set_flashdata('error', 'Wrong Password!');
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
					Wrong Password!
					</div>');
				redirect('user/edit');
			}
		}
	}

	public function changePassword()
	{

		$data['title'] = "Change Password";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->form_validation->set_rules('current_password', 'Current Password', 'trim|required');
		$this->form_validation->set_rules('new_password1', 'New Password', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('new_password2', 'Repeat New Password', 'trim|required|matches[new_password1]');
		if ($this->form_validation->run() ==  false) {
			$this->load->view('layouts/header', $data);
			$this->load->view('layouts/sidebar', $data);
			$this->load->view('layouts/topbar', $data);
			$this->load->view('user/change_password', $data);
			$this->load->view('layouts/footer');
		} else {
			$current_password = $this->input->post('current_password');
			$new_password1 = $this->input->post('new_password1');
			$new_password2 = $this->input->post('new_password2');
			if (!password_verify($current_password, $data['user']['password'])) {
				// $this->session->set_flashdata('flash_gagal', 'Password saat ini salah');
				$this->session->set_flashdata('error', 'Wrong current password!');
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong current password!</div>');
				redirect('user/changePassword');
			} else {
				if ($current_password == $new_password1) {
					// $this->session->set_flashdata('flash_gagal', 'Kata Sandi baru tidak boleh sama dengan kata sandi yang lama');
					$this->session->set_flashdata('warning', 'New password cannot be the same as current password!');
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password cannot be the same as current password!</div>');
					redirect('user/changePassword');
				} else {
					$password_hash = password_hash($new_password1, PASSWORD_DEFAULT);

					$this->db->set('password', $password_hash);
					$this->db->where('email', $this->session->userdata('email'));
					$this->db->update('user');
					// $this->session->set_flashdata('flash', 'Berhasil diubah');
					$this->session->set_flashdata('success', 'Password Changed!');
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">password changed!</div>');
					redirect('user/changePassword');
				}
			}
		}
	}

	public function keamanan()
	{
		$data['title'] = "Security";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['pertanyaan_keamanan'] = $this->db->get_where('pertanyaan_keamanan', ['id_user' => $data['user']['id']]);
		$data['pertanyaan_1'] = $this->db->get('pertanyaan_1')->result_array();
		$data['pertanyaan_2'] = $this->db->get('pertanyaan_2')->result_array();
		$this->form_validation->set_rules('id_pertanyaan_1', 'Question 1', 'trim|required');
		$this->form_validation->set_rules('id_pertanyaan_2', 'Question 2', 'trim|required');
		$this->form_validation->set_rules('jawaban_1', 'Answer 1', 'trim|required');
		$this->form_validation->set_rules('jawaban_2', 'Answer 2', 'trim|required');
		if ($this->form_validation->run() ==  false) {
			$this->load->view('layouts/header', $data);
			$this->load->view('layouts/sidebar', $data);
			$this->load->view('layouts/topbar', $data);
			$this->load->view("user/keamanan", $data);
			$this->load->view('layouts/footer');
		} else {
			$num_pertanyaan = $this->db->get_where('pertanyaan_keamanan', ['id_user' => $data['user']['id']])->num_rows();
			if ($num_pertanyaan > 0) {
				$value = [
					'id_pertanyaan_1' => $this->input->post('id_pertanyaan_1'),
					'jawaban_1' => $this->input->post('jawaban_1'),
					'id_pertanyaan_2' => $this->input->post('id_pertanyaan_2'),
					'jawaban_2' => $this->input->post('jawaban_2')
				];
				$this->db->where('id_user', $data['user']['id']);
				$this->db->update('pertanyaan_keamanan', $value);
			} else {
				$value = [
					'id_user' => $data['user']['id'],
					'id_pertanyaan_1' => $this->input->post('id_pertanyaan_1'),
					'jawaban_1' => $this->input->post('jawaban_1'),
					'id_pertanyaan_2' => $this->input->post('id_pertanyaan_2'),
					'jawaban_2' => $this->input->post('jawaban_2')
				];
				$this->db->insert('pertanyaan_keamanan', $value);
			}
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Security Updated!</div>');
			redirect('user/keamanan');
		}
	}

	public function readAllNotification()
	{
		$user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->db->where('id_user', $user['id']);
		$this->db->update('notifikasi', ['is_read' => 1]);
	}
	public function notifikasi()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('layouts/notification', $data);
	}
}
