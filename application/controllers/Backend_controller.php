<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Backend_controller extends MY_Controller
{
	const DATABASE_ID = 1;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Backend_model');
		$this->load->helper(['datafilter', 'date']);
	}
	public function userData()
	{
		return ucfirst($this->session->userdata('user_name'));
	}

	public function index()
	{

		if (isset($_POST['sign_in']) && $_SERVER['REQUEST_METHOD'] == 'POST') {

			$username = postDataFilterhtml($this->input->post('username'));
			$password = postDataFilterhtml(md5($this->input->post('password')));

			$result = $this->Backend_model->rowDataWithWhere('login_table', ['user_name' => $username, 'password' => $password]);
			if (!empty($result)) {
				$userSessionData = array(
					'user_id'  => $result['id'],
					'user_name'  => $result['user_name'],
				);
				$this->session->set_userdata($userSessionData);
				RedirectMessageLink("Welcome to Admin Panel {$result['user_name']}.", 'success', 'dashboard');
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
			'breadcrumbs' => 'Dashboard',
			'admin_name' => $this->userData(),
		];

		$filePath = view_back_end_path('dashboard');
		$this->load->view($filePath, $data);
	}
	public function footerdiv()
	{
		$pageName = 'Footer Div & Header Div';
		$fileName = 'footerdiv';
		$tableName = 'footerdiv';
		$whereConditon = ['id' => self::DATABASE_ID];

		if (isset($_POST['save']) && $_SERVER['REQUEST_METHOD'] == 'POST') {

			$updateData = [
				'about_us' => $this->input->post('aboutUs'),
				'tags' => postDataFilterhtml($this->input->post('tags')),
				'phone1' => postDataFilterhtml($this->input->post('phone1')),
				'phone2' => !empty($this->input->post('phone2')) ? postDataFilterhtml($this->input->post('phone2')) : '',
				'email' => postDataFilterhtml($this->input->post('email')),
				'working_hours' => postDataFilterhtml($this->input->post('workingHours')),
				'copyright' => postDataFilterhtml($this->input->post('copyright')),
				'created_at' => getCurrentTime(),
			];

			$responseResult = $this->Backend_model->updateWithWhere($tableName, $updateData, $whereConditon);
			if ($responseResult === TRUE) {
				RedirectMessageLink("Information updated successfully in <strong> $pageName </strong> ", 'success', $fileName);
			} else {
				RedirectMessageLink('Database Problem', 'danger', $fileName);
			}
		}



		$data = [
			'title' => $pageName . $this->appendTitle,
			'breadcrumbs' => $pageName,
			'admin_name' => $this->userData(),
			'pageData' => $this->Backend_model->rowDataWithWhere($tableName, $whereConditon)
		];


		$filePath = view_back_end_path($fileName);
		$this->load->view($filePath, $data);
	}
	public function contactpage()
	{
		$pageName = 'Contact Page';
		$fileName = 'contactpage';
		$tableName = 'contact_table';
		$whereConditon = ['id' => self::DATABASE_ID];

		if (isset($_POST['save']) && $_SERVER['REQUEST_METHOD'] == 'POST') {

			$updateData = [
				'contact_info' => postDataFilterhtml($this->input->post('contact_info')),
				'address' => $this->input->post('address'),
				'created_at' => getCurrentTime(),
			];

			$responseResult = $this->Backend_model->updateWithWhere($tableName, $updateData, $whereConditon);
			if ($responseResult === TRUE) {
				RedirectMessageLink("Information updated successfully in <strong> $pageName </strong> ", 'success', $fileName);
			} else {
				RedirectMessageLink('Database Problem', 'danger', $fileName);
			}
		}

		$data = [
			'title' => $pageName . $this->appendTitle,
			'breadcrumbs' => $pageName,
			'admin_name' => $this->userData(),
			'pageData' => $this->Backend_model->rowDataWithWhere($tableName, $whereConditon)
		];


		$filePath = view_back_end_path($fileName);
		$this->load->view($filePath, $data);
	}
	public function aboutpage()
	{
		$pageName = 'About US Page';
		$fileName = 'aboutpage';
		$tableName = 'about_table';
		$whereConditon = ['id' => self::DATABASE_ID];

		if (isset($_POST['save']) && $_SERVER['REQUEST_METHOD'] == 'POST') {

			$updateData = [
				'about_description' => $this->input->post('about_description'),
				'created_at' => getCurrentTime(),
			];

			$responseResult = $this->Backend_model->updateWithWhere($tableName, $updateData, $whereConditon);
			if ($responseResult === TRUE) {
				RedirectMessageLink("Information updated successfully in <strong> $pageName </strong> ", 'success', $fileName);
			} else {
				RedirectMessageLink('Database Problem', 'danger', $fileName);
			}
		}

		$data = [
			'title' => $pageName . $this->appendTitle,
			'breadcrumbs' => $pageName,
			'admin_name' => $this->userData(),
			'pageData' => $this->Backend_model->rowDataWithWhere($tableName, $whereConditon)
		];


		$filePath = view_back_end_path($fileName);
		$this->load->view($filePath, $data);
	}

	public function logout()
	{
		session_start();
		$this->session->sess_destroy();
		redirect('backend_controller');
	}
}
