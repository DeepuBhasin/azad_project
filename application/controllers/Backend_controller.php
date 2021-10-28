<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Backend_controller extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Backend_model');
	}
	public function index()
	{
		echo "Backend";
	}
	public function login()
	{
		if (isset($_POST['sign_in']) && $_SERVER['REQUEST_METHOD'] == 'POST') {

			$this->load->helper(['form', 'redirect', 'datafilter']);

			$username = postDataFilter($this->input->post('username'));
			$password = postDataFilter(md5($this->input->post('password')));

			$result = $this->Backend_model->rowDataWithWhere('login_table', ['user_name' => $username, 'password' => $password]);
			if (!empty($result)) {
				$result = array(
					'user_id'  => $result->id,
					'user_name'  => $result->user_name,
				);
				$this->session->set_userdata($result);
				RedirectMessageLink("Welcome to Admin Panel {$result['user_name']}.", 'success', 'backend_controller');
			} else {
				RedirectMessageLink('Invalid Username or Password. Please Check Carefully', 'danger', 'admin_login');
			}
		}

		$data['csrf'] = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);


		$this->load->view('html/back_end_view/login', $data);
	}
}
