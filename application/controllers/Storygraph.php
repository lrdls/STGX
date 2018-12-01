<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User class.
 * 
 * @extends CI_Controller
 */
class Storygraph extends CI_Controller {

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		
		parent::__construct();

	}
	
	
	public function index() {
        // $data['session_user'] = $this->session_user;
        /*
         * Load view
         */
		$this->load->view('stgx/storygraph');
		
	}
	
	
}
