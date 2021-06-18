<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('m_admin');
	}

	public function index()
	{
		if($this->session->userdata('logged_in') == TRUE){
			$data['notif'] = $this->session->userdata('notif');
			$this->session->unset_userdata('notif');
			$data['success'] = $this->session->userdata('success');
			$this->session->unset_userdata('success');
			$data['books'] = $this->m_admin->getAllBooks();
			$data['main_view'] = 'staff/book_list';
			$this->load->view('staff/template_staff', $data);
		} else {
			redirect('Auth');
		}
	}

	public function viewBooks(){
		if($this->session->userdata('logged_in') == TRUE){
			$data['notif'] = $this->session->userdata('notif');
			$this->session->unset_userdata('notif');
			$data['success'] = $this->session->userdata('success');
			$this->session->unset_userdata('success');
			$data['books'] = $this->m_admin->getAllBooks();
			$data['main_view'] = 'staff/book_list';
			$this->load->view('staff/template_staff', $data);
		} else {
			redirect('Auth');
		}
	}

	public function addNewBook(){
		if($this->session->userdata('logged_in') == TRUE){
			$data['notif'] = $this->session->userdata('notif');
			$this->session->unset_userdata('notif');
			$data['success'] = $this->session->userdata('success');
			$this->session->unset_userdata('success');
			$data['main_view'] = 'staff/add_book';
			$this->load->view('staff/template_staff', $data);
		} else {
			redirect('Auth');
		}
	}

	public function addBook(){
		if($this->session->userdata('logged_in') == TRUE){
			if($this->input->post('submit')){
				$this->form_validation->set_rules('title', 'Title', 'trim|required|is_unique[buku.TITLE]',array('is_unique'=>'This %s already exists.'));
				$this->form_validation->set_rules('publisher', 'Publisher', 'trim|required');
				$this->form_validation->set_rules('writer', 'Writer', 'trim|required');
				$this->form_validation->set_rules('year', 'Year', 'trim|required');
				$this->form_validation->set_rules('quantity', 'Quantity', 'trim|required');

				if ($this->form_validation->run() == TRUE) {
					$config['upload_path'] = './uploads/buku/';
					$config['allowed_types'] = 'jpeg|jpg|png';
					$config['max_size']  = '4096';

					$this->load->library('upload', $config);

					if($this->upload->do_upload('foto')){
						if($this->m_admin->addBook($this->upload->data()) == TRUE){
							$this->session->set_flashdata('success', 'Input New Book Success!!');
							redirect('Staff/addNewBook');
						}
					} else {
						$this->session->set_flashdata('notif', $this->upload->display_errors());
						redirect('Staff/addNewBook');
					}
				} else {
					$this->session->set_flashdata('notif',validation_errors());
					redirect('Staff/addNewBook');
				}
			} else {
				$this->session->set_flashdata('notif', 'input gagal nih');
					redirect('Staff/addNewBook');
			}
		} else {
			redirect('Auth');
		}
	}

	public function infoBook(){
		if($this->session->userdata('logged_in') == TRUE){
			$bookid = $this->uri->segment(3);
			$data['notif'] = $this->session->userdata('notif');
			$this->session->unset_userdata('notif');
			$data['success'] = $this->session->userdata('success');
			$this->session->unset_userdata('success');
			$data['books'] = $this->m_admin->getInfoBook($bookid);
			$data['main_view'] = 'staff/info_book';
			$this->load->view('staff/template_staff', $data);
		} else {
			redirect('Auth');
		}
	}

	public function editBook(){
		if($this->session->userdata('logged_in') == TRUE){
			$bookid = $this->uri->segment(3);
			if($this->input->post('submit')){
				$this->form_validation->set_rules('title', 'Title', 'trim|required');
				$this->form_validation->set_rules('publisher', 'Publisher', 'trim|required');
				$this->form_validation->set_rules('writer', 'Writer', 'trim|required');
				$this->form_validation->set_rules('year', 'Year', 'trim|required');
				$this->form_validation->set_rules('quantity', 'Quantity', 'trim|required');
				if ($this->form_validation->run() == TRUE) {
					if($this->m_admin->editBook($bookid) == TRUE){
						$this->session->set_flashdata('success', 'Edit Book Success!!');
						redirect('Staff/infoBook/'.$bookid);
					}
				} else {
					$this->session->set_flashdata('notif',validation_errors());
					redirect('Staff/infoBook/'.$bookid);
				}
			} else {
				$this->session->set_flashdata('notif', 'input gagal nih');
					redirect('Staff/infoBook/'.$bookid);
			}
		} else {
			redirect('Auth');
		}
	}

	public function editBookCover(){
		if($this->session->userdata('logged_in') == TRUE){
			$bookid = $this->uri->segment(3);
			if($this->input->post('submit')){
				$config['upload_path'] = './uploads/buku/';
				$config['allowed_types'] = 'jpeg|jpg|png';
				$config['max_size']  = '4096';

				$this->load->library('upload', $config);

				if($this->upload->do_upload('foto')){
					if($this->m_admin->editBookCover($this->upload->data(),$bookid) == TRUE){
						$this->session->set_flashdata('success', 'Edit Book Cover Success!!');
						redirect('Staff/infoBook/'.$bookid);
					}
				} else {
					$this->session->set_flashdata('notif', $this->upload->display_errors());
					redirect('Staff/infoBook/'.$bookid);
				}
			} else {
				$this->session->set_flashdata('notif', 'input gagal nih');
					redirect('Staff/infoBook/'.$bookid);
			}
		} else {
			redirect('Auth');
		}
	}

	public function deleteBook(){
		if($this->session->userdata('logged_in') == TRUE){
			$bookid = $this->uri->segment(3);
			if($this->m_admin->deleteBook($bookid) == TRUE){
				$this->session->set_flashdata('success','Delete Book Success!');
				redirect('Staff/viewBooks');
			} else {
				$this->session->set_flashdata('notif','Delet Book Failed!!');
				redirect('Staff/viewBooks');
			}
		} else {
			redirect('Auth');
		}
	}

}

/* End of file Staff.php */
/* Location: ./application/controllers/Staff.php */