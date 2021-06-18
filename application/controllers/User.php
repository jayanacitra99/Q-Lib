<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('m_user');
		$this->load->model('m_auth');
	}

	public function index()
	{
		$data['success'] = $this->session->userdata('success');
		$this->session->unset_userdata('success');
		$data['notif'] = $this->session->userdata('notif');
		$this->session->unset_userdata('notif');
		$username = $this->session->userdata('username');
		$data['newR'] = $this->m_user->getNewBooks();
		$data['id'] = $this->m_auth->getDataUser($username);
		$data['onyou'] = $this->m_user->getOnYou($username);
		$data['books'] = $this->m_user->getAllBooks();
		$data['last'] = $this->m_user->getLastRent();
		$this->load->view('user/home', $data);
	}

	public function infoBuku(){
		$data['success'] = $this->session->userdata('success');
		$this->session->unset_userdata('success');
		$data['notif'] = $this->session->userdata('notif');
		$this->session->unset_userdata('notif');
		$bookid = $this->uri->segment(3);
		$data['book'] = $this->m_user->getInfoBook($bookid);
		$data['main_view'] = 'user/info_book';
		$this->load->view('user/template_user', $data);
	}

	public function rentBook(){
		if($this->session->userdata('logged_in') == TRUE){
			$username = $this->session->userdata('username');
			$data = $this->m_auth->getDataUser($username);
			$userid = $data->ID_USER;
			$bookid = $this->uri->segment(3);
			$quan = $this->m_user->getInfoBook($bookid);
			$quan = $quan->QUANTITY;
			if($this->m_user->checkMember($userid) == 'NOT FOUND'){
				$totrans = $this->m_user->checkTotalRent($userid);
				if($totrans <4) {
					if($this->m_user->rentBook($bookid,$userid,$quan) == TRUE){
						$this->session->set_flashdata('success', 'Berhasil Meminjam Buku :)');
						redirect('User');
					} else {
						$this->session->set_flashdata('notif', 'Gagal Meminjam Buku :(');
						redirect('User');
					}
				} else {
					$this->session->set_flashdata('notif', 'Exceed Rent Limit (Max 4 Books)');
					redirect('Auth');		
				}
			} else {
				$member = $this->m_user->checkMember($userid);
				$member = $member->MEMBER_TYPE;
				if($member == 'SILVER'){
					$totrans = $this->m_user->checkTotalRent($userid);
					if($totrans < 6) {
						if($this->m_user->rentBook($bookid,$userid,$quan) == TRUE){
							$this->session->set_flashdata('success', 'Berhasil Meminjam Buku :)');
							redirect('User');
						} else {
							$this->session->set_flashdata('notif', 'Gagal Meminjam Buku :(');
							redirect('User');
						}
					} else {
						$this->session->set_flashdata('notif', 'Exceed Rent Limit (Max 6 Books)');
						redirect('Auth');		
					}
				} else if($member == 'GOLD'){
					if($totrans < 8) {
						if($this->m_user->rentBook($bookid,$userid,$quan) == TRUE){
							$this->session->set_flashdata('success', 'Berhasil Meminjam Buku :)');
							redirect('User');
						} else {
							$this->session->set_flashdata('notif', 'Gagal Meminjam Buku :(');
							redirect('User');
						}
					} else {
						$this->session->set_flashdata('notif', 'Exceed Rent Limit (Max 8 Books)');
						redirect('Auth');		
					}
				} else if($member == 'PLATINUM'){
					if($totrans < 10) {
						if($this->m_user->rentBook($bookid,$userid,$quan) == TRUE){
							$this->session->set_flashdata('success', 'Berhasil Meminjam Buku :)');
							redirect('User');
						} else {
							$this->session->set_flashdata('notif', 'Gagal Meminjam Buku :(');
							redirect('User');
						}
					} else {
						$this->session->set_flashdata('notif', 'Exceed Rent Limit (Max 10 Books)');
						redirect('Auth');		
					}
				}
			}
		} else {
			$this->session->set_flashdata('notif', 'Harap Login terlebih dahulu');
			redirect('Auth');
		}
	}

	public function returnBuku(){
		if($this->session->userdata('logged_in') == TRUE){
			$data['success'] = $this->session->userdata('success');
			$this->session->unset_userdata('success');
			$data['notif'] = $this->session->userdata('notif');
			$this->session->unset_userdata('notif');
			$bookid = $this->uri->segment(3);
			$username = $this->session->userdata('username');
			$data['mytrans'] = $this->m_user->getMyTransaction($username,$bookid);
			$data['main_view'] = 'user/return_book';
			$this->load->view('user/template_user', $data);
		} else {
			$this->session->set_flashdata('notif', 'Harap Login terlebih dahulu');
			redirect('Auth');
		}
	}

	public function returnThisBook(){
		if($this->session->userdata('logged_in') == TRUE){
			$fine = $this->uri->segment(4);
			$bookid = $this->uri->segment(3);
			$transid = $this->uri->segment(5);
			$username = $this->session->userdata('username');
			$data = $this->m_auth->getDataUser($username);
			$userid = $data->ID_USER;
			$quan = $this->m_user->getInfoBook($bookid);
			$quan = $quan->QUANTITY;
			if($this->m_user->returnThisBook($userid,$bookid,$transid,$fine,$quan) == TRUE){
				$this->session->set_flashdata('success', 'Return Book Success');
				redirect('User');
			} else {
				$this->session->set_flashdata('notif', 'Return Book Failed! :(');
				redirect('User/returnBuku/'.$bookid);
			}
		} else {
			$this->session->set_flashdata('notif', 'Harap Login terlebih dahulu');
			redirect('Auth');
		}
	}

	public function getMembership(){
		if($this->session->userdata('logged_in') == TRUE){
			$username = $this->session->userdata('username');
			$data = $this->m_auth->getDataUser($username);
			$userid = $data->ID_USER;
			if($this->m_user->checkMember($userid) == 'NOT FOUND'){
				$iduser = $this->uri->segment(3);
				$member = $this->uri->segment(4);
				if($this->m_user->getMembership($iduser,$member) == TRUE){
					$this->session->set_flashdata('success', 'Thank You for becoming our Member');
					redirect('Auth');
				} else {
					$this->session->set_flashdata('notif', 'Failed to get Membership :(');
					redirect('Auth');
				}
			} else {
				$this->session->set_flashdata('notif', 'You already have Membership');
				redirect('Auth');
			}
		} else {
			$this->session->set_flashdata('notif', 'Harap Login terlebih dahulu');
			redirect('Auth');
		}
	}

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */