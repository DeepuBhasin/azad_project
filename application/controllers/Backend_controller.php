<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Backend_controller extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Backend_model');
		$this->load->helper(['datafilter']);
	}
	public function index()
	{

		if (isset($_POST['sign_in']) && $_SERVER['REQUEST_METHOD'] == 'POST') {

			$username = postDataFilter($this->input->post('username'));
			$password = postDataFilter(md5($this->input->post('password')));

			$result = $this->Backend_model->rowDataWithWhere('login_table', ['user_name' => $username, 'password' => $password]);
			if (!empty($result)) {
				$userSessionData = array(
					'user_id'  => $result['id'],
					'user_name'  => $result['user_name'],
				);
				$this->session->set_userdata($userSessionData);
				RedirectMessageLink("Welcome to Admin Panel {$result['user_name']}.", 'success', 'backend_controller/dashboard');
			} else {
				RedirectMessageLink('Invalid Username or Password. Please Check Carefully', 'danger', 'admin_login');
			}
		}

		$data['csrf'] = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);

		$data['title'] = "Admin Login " . $this->appendTitle;
		return $this->load->view(view_back_end_path('login'), $data);
	}
	public function dashboard()
	{
		$data = [
			'title' => "Dasboard " . $this->appendTitle,
			'admin_name' => ucfirst($this->session->userdata('user_name')),
		];

		$filePath = view_back_end_path('dashboard');
		$this->load->view($filePath, $data);
	}
	public function logout()
	{
		session_start();
		$this->session->sess_destroy();
		redirect('backend_controller');
	}
}
