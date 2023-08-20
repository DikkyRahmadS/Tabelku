<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tabelku extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $data['title'] = "Pencatatan";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pembelians'] = $this->db->get('pembelian')->result_array();
		$data['role'] = $this->db->get('user_role')->result_array();
		$this->db->select('*, user_role.id AS rid, user.id AS uid');
		$this->db->from('user');
		$this->db->join('user_role', 'user_role.id = user.role_id');
		$this->db->where('user.id !=', 0);
		$this->db->where('user.role_id = ', 3);
		$data['user_data'] = $this->db->get()->result_array();

        $this->form_validation->set_rules('nama_penjual', 'Nama Penjual', 'trim|required');
        $this->form_validation->set_rules('harga_beli', 'Harga Beli', 'trim|required');
        $this->form_validation->set_rules('bobot', 'Bobot', 'trim|required');
        $this->form_validation->set_rules('kualitas', 'Kualitas', 'trim|required');
        $this->form_validation->set_rules('tanggal_pembelian', 'Tanggal Pembelian', 'trim|required');
        $this->form_validation->set_rules('total_bayar', 'Total Bayar', 'trim|required');

        if ($this->form_validation->run() == false) {
            // $this->index();
            $this->load->view('layouts/header', $data);
            $this->load->view('layouts/sidebar', $data);
            $this->load->view('layouts/topbar', $data);
            $this->load->view('tabelku/index', $data);
            $this->load->view('layouts/footer');
        } else {
            if ($this->input->post('aksi') == "add") {
                $this->db->insert('pembelian', [
                    'nama_penjual' => $this->input->post('nama_penjual'),
                    'harga_beli' => $this->input->post('harga_beli'),
                    'bobot' => $this->input->post('bobot'),
                    'kualitas' => $this->input->post('kualitas'),
                    'tanggal_pembelian' => $this->input->post('tanggal_pembelian'),
                    'total_bayar' => $this->input->post('total_bayar'),
                    'created_by' => $data['user']['name'],
                ]);

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Catatan pembelian telah disimpan!
                    </div>');
                $this->session->set_flashdata('success', 'Catatan pembelian telah disimpan!!');
            } elseif ($this->input->post('aksi') == "update") {

                $data = [
                    'nama_penjual' => $this->input->post('nama_penjual'),
                    'harga_beli' => $this->input->post('harga_beli'),
                    'bobot' => $this->input->post('bobot'),
                    'kualitas' => $this->input->post('kualitas'),
                    'tanggal_pembelian' => $this->input->post('tanggal_pembelian'),
                    'total_bayar' => $this->input->post('total_bayar'),
                    'updated_by' => $data['user']['name'],
                ];
                $this->db->where('id', $this->input->post('id'));
                $this->db->update('pembelian', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                catatan pembelian berhasil diperbarui!
                    </div>');
                $this->session->set_flashdata('success', 'Data pembelian berhasil diperbarui!');
            }
            redirect('tabelku/pembelian');
        }
    }

    public function pembelian()
    {
        $data['title'] = "Data pembelian";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->db->order_by('id', 'desc');
        $data['pembelians'] = $this->db->get('pembelian')->result_array();
		
        $this->form_validation->set_rules('nama_penjual', 'Nama Penjual', 'trim|required');
        $this->form_validation->set_rules('harga_beli', 'Harga Beli', 'trim|required');
        $this->form_validation->set_rules('bobot', 'Bobot', 'trim|required');
        $this->form_validation->set_rules('kualitas', 'Kualitas', 'trim|required');
        $this->form_validation->set_rules('tanggal_pembelian', 'Tanggal Pembelian', 'trim|required');
        $this->form_validation->set_rules('total_bayar', 'Total Bayar', 'trim|required');

        if ($this->form_validation->run() == false) {
            // $this->index();
            $this->load->view('layouts/header', $data);
            $this->load->view('layouts/sidebar', $data);
            $this->load->view('layouts/topbar', $data);
            $this->load->view('tabelku/pembelian', $data);
            $this->load->view('layouts/footer');
        } else {
            if ($this->input->post('aksi') == "add") {
                $this->db->insert('pembelian', [
                    'nama_penjual' => $this->input->post('nama_penjual'),
                    'harga_beli' => $this->input->post('harga_beli'),
                    'bobot' => $this->input->post('bobot'),
                    'kualitas' => $this->input->post('kualitas'),
                    'tanggal_pembelian' => $this->input->post('tanggal_pembelian'),
                    'total_bayar' => $this->input->post('total_bayar'),
                    'created_by' => $data['user']['name'],
                ]);

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Catatan pembelian telah disimpan!
                    </div>');
                $this->session->set_flashdata('success', 'Catatan pembelian telah disimpan!!');
            } elseif ($this->input->post('aksi') == "update") {

                $data = [
                    'nama_penjual' => $this->input->post('nama_penjual'),
                    'harga_beli' => $this->input->post('harga_beli'),
                    'bobot' => $this->input->post('bobot'),
                    'kualitas' => $this->input->post('kualitas'),
                    'tanggal_pembelian' => $this->input->post('tanggal_pembelian'),
                    'total_bayar' => $this->input->post('total_bayar'),
                    'updated_by' => $data['user']['name'],
                ];
                $this->db->where('id', $this->input->post('id'));
                $this->db->update('pembelian', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                catatan pembelian berhasil diperbarui!
                    </div>');
                $this->session->set_flashdata('success', 'Data pembelian berhasil diperbarui!');
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('pembelian');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        catatan pembelian berhasil dihapus!
			</div>');
        $this->session->set_flashdata('flash', 'Catatan pembelian berhasil dihapus!');

        redirect($_SERVER['HTTP_REFERER']);
    }

    public function laporan()
    {
        $data['title'] = "Laporan";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('dari', 'Dari', 'trim|required');
        $this->form_validation->set_rules('sampai', 'Sampai', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('layouts/header', $data);
            $this->load->view('layouts/sidebar', $data);
            $this->load->view('layouts/topbar', $data);
            $this->load->view('tabelku/laporan', $data);
            $this->load->view('layouts/footer');
        } else {
            // Ambil tanggal dari form setelah submit
            $dari = $this->input->post('dari');
            $sampai = $this->input->post('sampai');
            $data['val_dari'] = $dari;
            $data['val_sampai'] = $sampai;

            // Konversi tanggal dari dan sampai ke dalam format database (YYYY-MM-DD)
            $dari = date('Y-m-d', strtotime($dari));
            $sampai = date('Y-m-d', strtotime($sampai));

            // Lakukan pengkondisian berdasarkan tanggal_pembelian dalam query
            $this->db->where("tanggal_pembelian BETWEEN '$dari' AND '$sampai'");
            $data['laporans'] = $this->db->get('pembelian')->result_array();
            $data['dari'] = $dari;
            $data['sampai'] = $sampai;
            if ($this->input->post('aksi') == "tampilkan") {
                $this->load->view('layouts/header', $data);
                $this->load->view('layouts/sidebar', $data);
                $this->load->view('layouts/topbar', $data);
                $this->load->view('tabelku/tampilkan-laporan', $data);
                $this->load->view('layouts/footer');
            } elseif ($this->input->post('aksi') == "cetak") {
                $this->load->view('tabelku/cetak', $data);
            }
        }
    }



    public function hitungHarga()
    {
        $bobot = $this->input->post('bobot');
        $harga_beli = $this->input->post('harga_beli');
        echo $bobot*$harga_beli;
    }

	public function pelanggan()
	{
		$data['title'] = "Data Pelanggan";
		$data['role'] = $this->db->get('user_role')->result_array();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->db->select('*, user_role.id AS rid, user.id AS uid');
		$this->db->from('user');
		$this->db->join('user_role', 'user_role.id = user.role_id');
		$this->db->where('user.id !=', 0);
		$this->db->where('user.role_id = ', 3);
		$data['user_data'] = $this->db->get()->result_array();

		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('gender', 'Gander', 'required|trim');
		$this->form_validation->set_rules('birthday', 'Birth Day', 'required|trim');
		$this->form_validation->set_rules('phone_number', 'Phone Number', 'required|trim');
		$this->form_validation->set_rules('address', 'Address', 'required|trim');
		if ($this->form_validation->run() == false) {
			$this->load->view('layouts/header', $data);
			$this->load->view('layouts/sidebar', $data);
			$this->load->view('layouts/topbar', $data);
			$this->load->view('tabelku/data-pelanggan', $data);
			$this->load->view('layouts/footer');
		} else {
			if ($this->input->post('aksi') == "add") {
				$data = [
					'name' => htmlspecialchars($this->input->post('name', true)),
					'gender' => htmlspecialchars($this->input->post('gender', true)),
					'birthday' => htmlspecialchars($this->input->post('birthday', true)),
					'phone_number' => htmlspecialchars($this->input->post('phone_number', true)),
					'address' => htmlspecialchars($this->input->post('address', true)),
					'role_id' => 3,
					'is_active' => 1,
					// 'is_active' => 0,
					'date_created' => time(),
				];
				$this->db->insert('user', $data);

				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Data Pelangan telah disimpan!
                    </div>');
				$this->session->set_flashdata('success', 'Data Pelangan telah disimpan!!');
			} elseif ($this->input->post('aksi') == "update") {
				$data = [
					'name' => htmlspecialchars($this->input->post('name', true)),
					'gender' => htmlspecialchars($this->input->post('gender', true)),
					'birthday' => htmlspecialchars($this->input->post('birthday', true)),
					'phone_number' => htmlspecialchars($this->input->post('phone_number', true)),
					'address' => htmlspecialchars($this->input->post('address', true)),
				];
				$this->db->where('id', $this->input->post('id'));
				$this->db->update('user', $data);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Data Pelanggan berhasil diperbarui!
                    </div>');
				$this->session->set_flashdata('success', 'Data Pelanggan berhasil diperbarui!');
			}
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function deletePelanggan($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('user');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data Pelanggan berhasil dihapus!
			</div>');
		$this->session->set_flashdata('flash', 'Data Pelanggan berhasil dihapus!');

		redirect($_SERVER['HTTP_REFERER']);
	}
}
