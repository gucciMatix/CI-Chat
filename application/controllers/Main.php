<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	public function index() {
		$this->load->model("chat");
		$this->load->view('main_view');
	}
}
