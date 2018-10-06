<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller {
    private $error = array();
    
    public function index() {
    	
    	if ($this->input->post() && $this->validate()) {
    		$this->load->model('item_model', 'items');
    		
    		$data['items'] = $this->items->getItems();
    		$data['user'] = $this->user->getId();
    		$data['menu'] =  site_url(array('logout'));
    		$data['user_name'] =  $this->user->getUserName();

    		include 'header.php';
	        $header = new Header();
	        $header->setTitle('Teszt');
	        $header->index();
	        
	        $this->load->view('order', $data);
	        
	        include 'footer.php';
	        $footer = new Footer();
	        $footer->index();         

    	} else {
        
	        $data['heading_title'] = 'Kosár Teszt Hello';
	        
	        $data['entry_email'] = 'E-mail';
	        $data['entry_password'] = 'Jelszó';
	        
	        $data['button_login'] = 'Belépés';
	        
	        
	        if (isset($this->session->userdata['warning'])) {
	            $data['error_warning'] = $this->session->userdata['warning'];
	            $this->session->unset_userdata('warning');
	        } else if (isset($this->error['warning'])) {
	            $data['error_warning'] = $this->error['warning'];
	        } else {
	            $data['error_warning'] = '';
	        }
	        
	        if (isset($this->session->userdata['success'])) {
	            $data['success'] = $this->session->userdata['success'];
	            $this->session->unset_userdata('success');
	        } else {
	            $data['success'] = '';
	        }
	        
	        if ($this->input->post('email')) {
	            $data['email'] = $this->input->post('email');
	        } else {
	            $data['email'] = '';
	        }
	        
	        if ($this->input->post('password')) {
	            $data['password'] = $this->input->post('password');
	        } else {
	            $data['password'] = '';
	        }
	        
	        include 'header.php';
	        $header = new Header();
	        $header->setTitle('Teszt');
	        $header->index();
	        
	        $this->load->view('login', $data);
	        
	        include 'footer.php';
	        $footer = new Footer();
	        $footer->index();
    	}
    }
    
    protected function validate() {
        
        if (!$this->user->login($this->input->post('email'), $this->input->post('password'))) {
            $this->error['warning'] = 'Hibás belépési adatok!';
        }
        
        if (!$this->error) {
            return true;
        } else {
            return false;
        }
    }
}
