<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Frontend_controller extends MY_Controller
{

	const DATABASE_ID = 1;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Backend_model');
	}

	public function index()
	{
		$pageName = 'Home';
		$data = [
			'title' => $pageName . $this->appendTitle,
			'breadcrumbs' => $pageName,
		];
		$this->load->view(view_front_end_path('index'), $data);
	}
	public function contact()
	{
		$this->load->helper(['datafilter', 'date']);

		$fileName = 'contact';
		$tableName = 'message_table';

		if (isset($_POST['send']) && $_SERVER['REQUEST_METHOD'] == 'POST') {

			$updateData = [
				'user_name' => postDataFilterhtml($this->input->post('name')),
				'email' => postDataFilterhtml($this->input->post('email')),
				'phone' => postDataFilterhtml($this->input->post('phone')),
				'message' => postDataFilterhtml($this->input->post('message')),
				'created_at' => getCurrentTime(),

			];
			$responseResult = $this->Backend_model->insertData($tableName, $updateData);
			if ($responseResult === TRUE) {
				RedirectMessageLink("Your Message Sent Successfully", 'success', $fileName);
			} else {
				RedirectMessageLink('Database Problem', 'danger', $fileName);
			}
		}



		$pageName = 'Contact';
		$data = [
			'title' => $pageName . $this->appendTitle,
			'breadcrumbs' => $pageName,
			'pageData' => $this->Backend_model->rowDataWithWhere('footerdiv', ['id' => self::DATABASE_ID]),
			'contactPageData' => $this->Backend_model->rowDataWithWhere('contact_table', ['id' => self::DATABASE_ID])

		];
		$this->load->view(view_front_end_path('contact'), $data);
	}
	public function project()
	{
		$pageName = 'Projects';
		$data = [
			'title' => $pageName . $this->appendTitle,
			'breadcrumbs' => $pageName,
			'pageData' => $this->Backend_model->rowDataWithWhere('footerdiv', ['id' => self::DATABASE_ID])
		];
		$this->load->view(view_front_end_path('project'), $data);
	}
	public function about()
	{
		$pageName = 'About us';
		$data = [
			'title' => $pageName . $this->appendTitle,
			'breadcrumbs' => $pageName,
			'pageData' => $this->Backend_model->rowDataWithWhere('footerdiv', ['id' => self::DATABASE_ID]),
			'aboutPageData' => $this->Backend_model->rowDataWithWhere('about_table', ['id' => self::DATABASE_ID])
		];
		$this->load->view(view_front_end_path('about'), $data);
	}
}
