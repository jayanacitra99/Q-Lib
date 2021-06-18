<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('m_admin');
	}

		// if($this->session->userdata('logged_in') == TRUE){

		// } else {
		// 	redirect('Auth');
		// }

	public function index()
	{
		if($this->session->userdata('logged_in') == TRUE){
			$data['success'] = $this->session->userdata('success');
			$this->session->unset_userdata('success');
			$data['main_view'] = 'admin/dashboard';
			$this->load->view('admin/template_admin', $data);
		} else {
			redirect('Auth');
		}
	}

	public function viewUsers(){
		if($this->session->userdata('logged_in') == TRUE){
			$data['notif'] = $this->session->userdata('notif');
			$this->session->unset_userdata('notif');
			$data['success'] = $this->session->userdata('success');
			$this->session->unset_userdata('success');
			$data['users'] = $this->m_admin->getAllUsers();
			$data['main_view'] = 'admin/user_list';
			$this->load->view('admin/template_admin', $data);
		} else {
			redirect('Auth');
		}
	}

	public function viewTransactions(){
		if($this->session->userdata('logged_in') == TRUE){
			$data['notif'] = $this->session->userdata('notif');
			$this->session->unset_userdata('notif');
			$data['success'] = $this->session->userdata('success');
			$this->session->unset_userdata('success');
			$data['trans'] = $this->m_admin->getAllTransaction();
			$data['main_view'] = 'admin/transaction_list';
			$this->load->view('admin/template_admin', $data);
		} else {
			redirect('Auth');
		}
	}

	public function viewHistory(){
		if($this->session->userdata('logged_in') == TRUE){
			$data['notif'] = $this->session->userdata('notif');
			$this->session->unset_userdata('notif');
			$data['success'] = $this->session->userdata('success');
			$this->session->unset_userdata('success');
			$data['history'] = $this->m_admin->getAllTransaction();
			$data['main_view'] = 'admin/history_list';
			$this->load->view('admin/template_admin', $data);
		} else {
			redirect('Auth');
		}
	}

	public function viewMembers(){
		if($this->session->userdata('logged_in') == TRUE){
			$data['notif'] = $this->session->userdata('notif');
			$this->session->unset_userdata('notif');
			$data['success'] = $this->session->userdata('success');
			$this->session->unset_userdata('success');
			$data['member'] = $this->m_admin->getAllMembership();
			$data['main_view'] = 'admin/member_list';
			$this->load->view('admin/template_admin', $data);
		} else {
			redirect('Auth');
		}
	}

	public function addNewUser(){
		if($this->session->userdata('logged_in') == TRUE){
			$data['notif'] = $this->session->userdata('notif');
			$this->session->unset_userdata('notif');
			$data['success'] = $this->session->userdata('success');
			$this->session->unset_userdata('success');
			$data['main_view'] = 'admin/add_user';
			$this->load->view('admin/template_admin', $data);
		} else {
			redirect('Auth');
		}
	}

	public function addUser(){
		if($this->session->userdata('logged_in') == TRUE){
			if($this->input->post('submit')){
				$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[6]|is_unique[user.USERNAME]',array('is_unique'=>'This %s already exists.'));
				$this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[user.EMAIL]',array('is_unique'=>'This %s already exists.'));
				$this->form_validation->set_rules('name', 'Name', 'trim|required');
				$this->form_validation->set_rules('phone', 'Phone Number', 'trim|required');
				$this->form_validation->set_rules('role', 'Role', 'trim|required');
				$this->form_validation->set_rules('password', 'Password', 'min_length[6]|trim|required');
				$this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'trim|required|matches[password]');

				if ($this->form_validation->run() == TRUE) {
					if($this->m_admin->addUser() == TRUE){
						$this->session->set_flashdata('success', 'Input New User Success!!');
						redirect('Admin/addNewUser');
					}
				} else {
					$this->session->set_flashdata('notif',validation_errors());
					redirect('Admin/addNewUser');
				}
			} else {
				$this->session->set_flashdata('notif', 'input gagal nih');
					redirect('Admin/addNewUser');
			}
		} else {
			redirect('Auth');
		}
	}

	public function infoUser(){
		if($this->session->userdata('logged_in') == TRUE){
			$userid = $this->uri->segment(3);
			$data['notif'] = $this->session->userdata('notif');
			$this->session->unset_userdata('notif');
			$data['success'] = $this->session->userdata('success');
			$this->session->unset_userdata('success');
			$data['users'] = $this->m_admin->getInfoUser($userid);
			$data['main_view'] = 'admin/info_user';
			$this->load->view('admin/template_admin', $data);
		} else {
			redirect('Auth');
		}
	}

	public function editUser(){
		if($this->session->userdata('logged_in') == TRUE){
			$userid = $this->uri->segment(3);
			if($this->input->post('submit')){
				$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[6]');
				$this->form_validation->set_rules('email', 'Email', 'trim|required');
				$this->form_validation->set_rules('name', 'Name', 'trim|required');
				$this->form_validation->set_rules('phone', 'Phone Number', 'trim|required');
				$this->form_validation->set_rules('password', 'Password', 'min_length[6]|trim|required');
				$this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'trim|required|matches[password]');

				if ($this->form_validation->run() == TRUE) {
					if($this->m_admin->editUser($userid) == TRUE){
						$this->session->set_flashdata('success', 'Edit User Success!!');
						redirect('Admin/infoUser/'.$userid);
					}
				} else {
					$this->session->set_flashdata('notif',validation_errors());
					redirect('Admin/infoUser/'.$userid);
				}
			} else {
				$this->session->set_flashdata('notif', 'input gagal nih');
					redirect('Admin/infoUser/'.$userid);
			}
		} else {
			redirect('Auth');
		}
	}

	public function deleteUser(){
		if($this->session->userdata('logged_in') == TRUE){
			$userid = $this->uri->segment(3);
			if($this->m_admin->deleteUser($userid) == TRUE){
				$this->session->set_flashdata('success','Delete User Success!');
				redirect('Admin/viewUsers');
			} else {
				$this->session->set_flashdata('notif','Delet User Failed!!');
				redirect('Admin/viewUsers');
			}
		} else {
			redirect('Auth');
		}
	}
}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */