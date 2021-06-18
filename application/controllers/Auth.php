<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('m_auth');
	}

	public function index()
	{
		if($this->session->userdata('logged_in') == TRUE){
			$username = $this->session->userdata('username');
			$data = $this->m_auth->getDataUser($username);
			$role = $data->ROLE;
			if($role == 'USER'){
				redirect('User');
			} else if($role == 'ADMIN'){
				redirect('Admin');
			} else {
				redirect('Staff');
			}
		} else {
			$data['notif'] = $this->session->userdata('notif');
			$this->session->unset_userdata('notif');
			$data['success'] = $this->session->userdata('success');
			$this->session->unset_userdata('success');
			$this->load->view('auth/login', $data);
		}
	}

	public function login(){
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');

		if ($this->form_validation->run() == TRUE) {
			if($this->input->post('submit')){
				if($this->m_auth->login() == TRUE){
					$username = $this->session->userdata('username');
					$data = $this->m_auth->getDataUser($username);
					$role = $data->ROLE;
					if($role == 'USER'){
						$this->session->set_flashdata('success', 'LOGIN SUCCESS!');
						redirect('User');
					} else if($role == 'ADMIN'){
						$this->session->set_flashdata('success', 'LOGIN SUCCESS!');
						redirect('Admin');
					} else {
						$this->session->flashdata('success', 'LOGIN SUCCESS!');
						redirect('Staff');
					}
				} else {
					$data['notif'] = 'Account doesnt exist!';
					$this->load->view('auth/login',$data);
				}
			} 
		} else {
			$data['notif'] = validation_errors();
			$this->load->view('auth/login',$data);
		}
	}

	public function logout(){
		$data = array(
				'username' => '',
				'logged_in'=> FALSE
			);
		$this->session->sess_destroy();
		$this->session->set_flashdata('success', 'Logout Berhasil');
		redirect('Auth');
	}

	public function register(){
		$data['notif'] = $this->session->userdata('notif');
		$this->session->unset_userdata('notif');
		$data['success'] = $this->session->userdata('success');
		$this->session->unset_userdata('success');
		$this->load->view('auth/register');
	}

	public function registerUser(){
		if($this->input->post('submit')){
			$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[6]|is_unique[user.USERNAME]',array('is_unique'=>'This %s already exists.'));
			$this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[user.EMAIL]',array('is_unique'=>'This %s already exists.'));
			$this->form_validation->set_rules('name', 'Name', 'trim|required');
			$this->form_validation->set_rules('phone', 'Phone Number', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'min_length[6]|trim|required');
			$this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'trim|required|matches[password]');
			if ($this->form_validation->run() == TRUE) {
				if($this->m_auth->registerUser() == TRUE){
					$this->session->set_flashdata('success', 'Register Success!!');
					redirect('Auth');
				}
			} else {
				$this->session->set_flashdata('notif',validation_errors());
				redirect('Auth/register');
			}
		} else {
			$this->session->set_flashdata('notif', 'input gagal nih');
				redirect('Auth/register');
		}
	}

}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */