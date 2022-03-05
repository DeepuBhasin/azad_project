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
	private function userData()
	{
		return ucfirst($this->session->userdata('user_name'));
	}

	private function loginUserAuthenticate()
	{
		$check = !empty($this->session->userdata('user_id')) ? TRUE : FALSE;
		if ($check === FALSE) {
			RedirectMessageLink('Please Login First', 'danger', 'admin_login');
		}
	}
	private function alreadyLoggedUserAuthenticate()
	{
		$check = !empty($this->session->userdata('user_id')) ? TRUE : FALSE;
		if ($check === TRUE) {
			redirect('dashboard');
		}
	}

	public function index()
	{
		$this->alreadyLoggedUserAuthenticate();

		if (isset($_POST['sign_in']) && $_SERVER['REQUEST_METHOD'] == 'POST') {

			$username = postDataFilterhtml($this->input->post('username'));
			$password = postDataFilterhtml(md5($this->input->post('password')));

			$result = $this->Backend_model->rowDataWithWhere('login_table', '*', ['user_name' => $username, 'password' => $password]);
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
		$this->loginUserAuthenticate();

		$data = [
			'title' => "Dasboard " . $this->appendTitle,
			'breadcrumbs' => 'Dashboard',
			'admin_name' => $this->userData(),
			'dashboardPageData' => $this->Backend_model->rowsData('message_table', 'id,user_name,email,phone,message,created_at', 'created_at', 'DESC'),
		];

		$filePath = view_back_end_path('dashboard');
		$this->load->view($filePath, $data);
	}
	public function footerdiv()
	{
		$this->loginUserAuthenticate();

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
			'pageData' => $this->Backend_model->rowDataWithWhere($tableName, '*', $whereConditon)
		];


		$filePath = view_back_end_path($fileName);
		$this->load->view($filePath, $data);
	}
	public function contactpage()
	{
		$this->loginUserAuthenticate();
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
			'pageData' => $this->Backend_model->rowDataWithWhere($tableName, '*', $whereConditon)
		];


		$filePath = view_back_end_path($fileName);
		$this->load->view($filePath, $data);
	}
	public function aboutpage()
	{
		$this->loginUserAuthenticate();
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
			'pageData' => $this->Backend_model->rowDataWithWhere($tableName, '*', $whereConditon)
		];


		$filePath = view_back_end_path($fileName);
		$this->load->view($filePath, $data);
	}
	public function addproject()
	{
		$this->loginUserAuthenticate();
		$this->load->helper(['imagefilter']);
		$pageName = 'Add Project';
		$fileName = 'addproject';
		$tableName = 'project_table';


		if (isset($_POST['add']) && $_SERVER['REQUEST_METHOD'] == 'POST') {


			$singleImageResponse1 = uploadSingleImage($_FILES['main_image_1']['name'], $_FILES['main_image_1']['tmp_name'], 'project');
			$singleImageResponse2 = uploadSingleImage($_FILES['main_image_2']['name'], $_FILES['main_image_2']['tmp_name'], 'project');
			$multipleImageResponse = uploadMultiImage($_FILES['slide_shows'], 'project');


			if ($singleImageResponse1 == FALSE || $singleImageResponse2 == FALSE || $multipleImageResponse == FALSE) {
				RedirectMessageLink('Server Error. Images not upload', 'danger', $fileName);
			}


			$insertData = [
				'title' => postDataFilterhtml($this->input->post('project_title')),
				'category' => $this->input->post('category'),
				'main_image_1' => $singleImageResponse1,
				'main_image_2' => $singleImageResponse2,
				'slide_show_images' => $multipleImageResponse,
				'description' => $this->input->post('description'),
				'project_date' => $this->input->post('project_date'),
				'location' => postDataFilterhtml($this->input->post('location')),
				'dashboard_status' => 0,
				'visibile_status' => 1,
				'created_at' => getCurrentTime(),
			];

			$responseResult = $this->Backend_model->insertData($tableName, $insertData);

			if ($responseResult === TRUE) {
				RedirectMessageLink("Project Added Successfully", 'success', $fileName);
			} else {
				RedirectMessageLink('Database Problem', 'danger', $fileName);
			}
		}

		$data = [
			'title' => $pageName . $this->appendTitle,
			'breadcrumbs' => $pageName,
			'admin_name' => $this->userData(),
			'projectCategory' => $this->Backend_model->rowsData('project_category', 'id,name', 'name', 'ASC')
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
	public function viewproject()
	{
		$this->loginUserAuthenticate();

		$pageName = 'View Projects';
		$fileName = 'viewproject';


		$data = [
			'title' => $pageName . $this->appendTitle,
			'breadcrumbs' => $pageName,
			'admin_name' => $this->userData(),
			'pageData' => $this->Backend_model->rowDataWithSingleInnerJoin('pt.id,pt.title,pc.name,pt.main_image_1,pt.dashboard_status,pt.visibile_status,pt.created_at', 'project_table as pt', 'project_category as pc', 'pc.id=pt.category',  [], 'pt.created_at', 'DESC', false, ['limitStatus' => true, 'limit' => 'ALL', 'offset' => ''])
		];


		$filePath = view_back_end_path($fileName);
		$this->load->view($filePath, $data);
	}
	public function showproject($project_id)
	{
		$pageName = 'Show Project';
		$fileName = 'showproject';

		$data = [
			'title' => $pageName . $this->appendTitle,
			'breadcrumbs' => $pageName,
			'admin_name' => $this->userData(),
			'pageData' => $this->Backend_model->rowDataWithSingleInnerJoin('pt.*,pc.name', 'project_table as pt', 'project_category as pc', 'pc.id=pt.category', ['pt.id' => $project_id],  'pt.created_at', 'DESC', true, ['limitStatus' => false])
		];


		$filePath = view_back_end_path($fileName);
		$this->load->view($filePath, $data);
	}
	public function dashboard_status($dashboardStatus, $tableId)
	{
		$this->loginUserAuthenticate();
		$fileName = 'viewproject';
		$tableName = 'project_table';

		$updateData = [
			'dashboard_status' => $dashboardStatus
		];
		$whereConditon = ['id' => $tableId];

		$responseResult = $this->Backend_model->updateWithWhere($tableName, $updateData, $whereConditon);
		if ($responseResult === TRUE) {
			RedirectMessageLink("Dashboard Status updated successfully", 'success', $fileName);
		} else {
			RedirectMessageLink('Database Problem', 'danger', $fileName);
		}
	}
	public function deleteproject($id)
	{
		$this->load->helper(['imagefilter']);
		$this->loginUserAuthenticate();
		$fileName = 'viewproject';
		$tableName = 'project_table';

		$data = $this->Backend_model->rowDataWithWhere($tableName, 'main_image_1,main_image_2,p', ['id' => $id]);
		$respone = $this->Backend_model->deleteWithWhere($tableName, ['id' => $id]);

		if ($respone === TRUE) {

			deleteImage($data['main_image_1'], 'project');
			deleteImage($data['main_image_2'], 'project');

			$slide_show_images = explode(',', $data['slide_show_images']);
			foreach ($slide_show_images as $key => $value) {
				deleteImage($value, 'project');
			}
		}
		RedirectMessageLink("Project Deleted Successfully", 'success', $fileName);
	}
	public function editproject($id)
	{
		$this->loginUserAuthenticate();
		$this->load->helper(['imagefilter']);
		$pageName = 'Edit Project';
		$fileName = 'editproject';


		$data = [
			'title' => $pageName . $this->appendTitle,
			'breadcrumbs' => $pageName,
			'admin_name' => $this->userData(),
			'projectCategory' => $this->Backend_model->rowsData('project_category', 'id,name', 'name', 'ASC'),
			'pageData' => $this->Backend_model->rowDataWithSingleInnerJoin('pt.*,pc.name', 'project_table as pt', 'project_category as pc', 'pc.id=pt.category', ['pt.id' => $id],  'pt.created_at', 'DESC', true, ['limitStatus' => false])
		];
		$filePath = view_back_end_path($fileName);
		$this->load->view($filePath, $data);
	}
	public function editsave()
	{
		$this->loginUserAuthenticate();

		if (isset($_POST['update']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
			$fileName = 'viewproject';
			$tableName = 'project_table';
			$id = $this->input->post('id');
			$this->load->helper(['imagefilter']);

			$updateData = [
				'title' => postDataFilterhtml($this->input->post('project_title')),
				'category' => $this->input->post('category'),
				'description' => $this->input->post('description'),
				'project_date' => $this->input->post('project_date'),
				'location' => postDataFilterhtml($this->input->post('location')),
				'dashboard_status' => $this->input->post('dashboard_status'),
				'visibile_status' =>  $this->input->post('visibile_status'),
				'created_at' => getCurrentTime(),
			];

			$data = $this->Backend_model->rowDataWithWhere($tableName, 'main_image_1,main_image_2,slide_show_images', ['id' => $id]);


			if (!empty($_FILES['main_image_1']['name'])) {
				$singleImageResponse1 = uploadSingleImage($_FILES['main_image_1']['name'], $_FILES['main_image_1']['tmp_name'], 'project');
				$updateData['main_image_1'] = $singleImageResponse1;
				if ($singleImageResponse1 == FALSE) {
					RedirectMessageLink('Server Error. Images not upload', 'danger', $fileName);
				}
				deleteImage($data['main_image_1'], 'project');
			}
			if (!empty($_FILES['main_image_2']['name'])) {
				$singleImageResponse2 = uploadSingleImage($_FILES['main_image_2']['name'], $_FILES['main_image_2']['tmp_name'], 'project');
				$updateData['main_image_2'] = $singleImageResponse2;
				if ($singleImageResponse2 == FALSE) {
					RedirectMessageLink('Server Error. Images not upload', 'danger', $fileName);
				}
				deleteImage($data['main_image_2'], 'project');
			}
			if (!empty($_FILES['slide_shows']['name'][0])) {

				$multipleImageResponse = uploadMultiImage($_FILES['slide_shows'], 'project');
				$updateData['slide_show_images'] = $multipleImageResponse;
				if ($multipleImageResponse == FALSE) {
					RedirectMessageLink('Server Error. Images not upload', 'danger', $fileName);
				}
				$slide_show_images = explode(',', $data['slide_show_images']);
				foreach ($slide_show_images as $key => $value) {
					deleteImage($value, 'project');
				}
			}
			$responseResult = $this->Backend_model->updateWithWhere($tableName, $updateData, ['id' => $id]);

			if ($responseResult === TRUE) {
				RedirectMessageLink("Project Updated Successfully", 'success', $fileName);
			} else {
				RedirectMessageLink('Database Problem. Project not Updated', 'danger', $fileName);
			}
		}
	}
	public function changepassword()
	{
		$this->loginUserAuthenticate();

		$pageName = 'Change Password';
		$fileName = 'changepassword';
		$tableName = 'login_table';


		if (isset($_POST['change']) && $_SERVER['REQUEST_METHOD'] == 'POST') {

			$old_password = md5(postDataFilterhtml($this->input->post('old_password')));
			$whereConditon =	['id' => self::DATABASE_ID, 'password' => $old_password];

			$passwordCheck = $this->Backend_model->rowDataWithWhere('login_table', 'id', $whereConditon);

			if (empty($passwordCheck)) {
				RedirectMessageLink("Old Password did not match ", 'danger', $fileName);
			}

			$new_password = postDataFilterhtml($this->input->post('new_password'));
			$confirm_password = postDataFilterhtml($this->input->post('confirm_password'));

			if ($new_password !== $confirm_password) {
				RedirectMessageLink('Password and Confirm Password not matched', 'danger', $fileName);
			}

			$updateData = [
				'password' => md5(postDataFilterhtml($this->input->post('confirm_password')))
			];

			$whereConditon =	['id' => self::DATABASE_ID];

			$responseResult = $this->Backend_model->updateWithWhere($tableName, $updateData, $whereConditon);
			if ($responseResult === TRUE) {
				RedirectMessageLink("Password Changed Successfully", 'success', $fileName);
			} else {
				RedirectMessageLink('Database Problem. Password not changed', 'danger', $fileName);
			}
		}

		$data = [
			'title' => $pageName . $this->appendTitle,
			'breadcrumbs' => $pageName,
			'admin_name' => $this->userData(),
		];


		$filePath = view_back_end_path($fileName);
		$this->load->view($filePath, $data);
	}
	public function homepage()
	{
		$this->loginUserAuthenticate();
		$pageName = 'Home Page';
		$fileName = 'homepage';
		$tableName = 'home_table';
		$whereConditon = ['id' => self::DATABASE_ID];
		$this->load->helper(['imagefilter']);

		$updateData = [
			'about_heading' => $this->input->post('about_heading'),
			'about_description' => $this->input->post('about_description')
		];

		if (isset($_POST['save']) && $_SERVER['REQUEST_METHOD'] == 'POST') {

			$data = $this->Backend_model->rowDataWithWhere($tableName, 'slide_show_images', $whereConditon);

			if (!empty($_FILES['slide_shows']['name'][0])) {

				$multipleImageResponse = uploadMultiImage($_FILES['slide_shows'], 'slideshow');
				if ($multipleImageResponse == FALSE) {
					RedirectMessageLink('Server Error. Images not upload', 'danger', $fileName);
				}

				if (isset($data['slide_show_images']) && !empty($data['slide_show_images'])) {
					$slide_show_images = explode(',', $data['slide_show_images']);
					foreach ($slide_show_images as $key => $value) {
						@deleteImage($value, 'slideshow');
					}
				}
				$updateData['slide_show_images'] = $multipleImageResponse;
			}

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
			'pageData' => $this->Backend_model->rowDataWithWhere($tableName, '*', $whereConditon)
		];

		$filePath = view_back_end_path($fileName);
		$this->load->view($filePath, $data);
	}
}
