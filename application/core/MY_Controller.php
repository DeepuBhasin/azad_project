<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    public $appendTitle = " | asconstruction | Azad Kamboj ";

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(['redirectmessage', 'filepathurls_helper', 'url', 'form']);
    }
}
