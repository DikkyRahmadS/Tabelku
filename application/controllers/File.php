<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class File extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index($file = null)
	{
		if (!empty($_FILES['thumbnail']['name'])) {
			$config['upload_path'] = "./assets/img/$file/";
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['max_size'] = '4096';

			// Generate random file name
			$config['file_name'] = uniqid();

			$this->load->library('upload', $config);
		}
		if ($this->upload->do_upload('thumbnail')) {
			$file_name = $this->upload->data('file_name');
			echo $file_name;
		} else {
			$error = $this->upload->display_errors();
			// Handle error
			return $error;
		}
	}

	public function avatar()
	{
		if (!empty($_FILES['thumbnail']['name'])) {
			$config['upload_path'] = './assets/img/avatar/';
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['max_size'] = '4096';

			// Generate random file name
			$config['file_name'] = uniqid();

			$this->load->library('upload', $config);
		}
		if ($this->upload->do_upload('thumbnail')) {
			$file_name = $this->upload->data('file_name');
			echo $file_name;
		} else {
			$error = $this->upload->display_errors();
			// Handle error
			return $error;
		}
	}
}
