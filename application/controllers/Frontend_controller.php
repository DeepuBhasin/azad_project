<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Frontend_controller extends MY_Controller
{

	const FOOTER_DIV_ID = 1;

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
		$pageName = 'Contact';
		$data = [
			'title' => $pageName . $this->appendTitle,
			'breadcrumbs' => $pageName,
			'pageData' => $this->Backend_model->rowDataWithWhere('footerdiv', ['id' => self::FOOTER_DIV_ID])
		];
		$this->load->view(view_front_end_path('contact'), $data);
	}
	public function project()
	{
		$pageName = 'Projects';
		$data = [
			'title' => $pageName . $this->appendTitle,
			'breadcrumbs' => $pageName,
			'pageData' => $this->Backend_model->rowDataWithWhere('footerdiv', ['id' => self::FOOTER_DIV_ID])
		];
		$this->load->view(view_front_end_path('project'), $data);
	}
	public function about()
	{
		$pageName = 'About us';
		$data = [
			'title' => $pageName . $this->appendTitle,
			'breadcrumbs' => $pageName,
			'pageData' => $this->Backend_model->rowDataWithWhere('footerdiv', ['id' => self::FOOTER_DIV_ID])
		];
		$this->load->view(view_front_end_path('about'), $data);
	}
}
