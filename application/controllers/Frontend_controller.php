<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Frontend_controller extends CI_Controller
{

	public function index()
	{
		$this->load->view('html/front_end_view/index.php');
	}
}
