<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Header extends CI_Controller {

	public function index()
	{		
		$this->load->view('header');
	}

	public function setTitle($title)
	{
		$this->data['heading_title'] = $title;
	}
}