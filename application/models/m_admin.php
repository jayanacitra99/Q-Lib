<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {

	public function getAllBooks(){
		return $this->db->order_by('ID_BUKU', 'ASC')
						->get('buku')
						->result();
	}

	public function getAllUsers(){
		return $this->db->order_by('ID_USER', 'ASC')
						->get('user')
						->result();
	}

	public function getAllTransaction(){
		return $this->db->select('*')
						->select('transaction.STATUS AS RentStatus')
						->order_by('ID_TRANSACTION', 'ASC')
						->join('user','user.ID_USER = transaction.ID_USER')
						->join('buku', 'buku.ID_BUKU = transaction.ID_BUKU')
						->get('transaction')
						->result();
	}

	public function getAllMembership(){
		return $this->db->order_by('ID_MEMBER', 'ASC')
						->join('user','user.ID_USER = member.ID_USER')
						->get('member')
						->result();
	}

	public function getInfoBook($bookid){
		return $this->db->where('ID_BUKU', $bookid)
						->get('buku')
						->row();
	}

	public function getInfoUser($userid){
		return $this->db->where('ID_USER', $userid)
						->get('user')
						->row();
	}

	public function addBook($foto){
		$data = array(
			'TITLE'			=> $this->input->post('title'),
			'PUBLISHER'		=> $this->input->post('publisher'),
			'WRITER'		=> $this->input->post('writer'),
			'YEAR'			=> $this->input->post('year'),
			'QUANTITY'	=> $this->input->post('quantity'),
			'STATUS'		=> 'AVAILABLE',
			'FOTO'			=> $foto['file_name']
		);

		$this->db->insert('buku', $data);

		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function addUser(){
		$data = array(
			'USERNAME'	=> $this->input->post('username'),
			'PASSWORD'	=> $this->input->post('password'),
			'NAME'		=> $this->input->post('name'),
			'EMAIL'		=> $this->input->post('email'),
			'PHONE'		=> $this->input->post('phone'),
			'ROLE'		=> $this->input->post('role'),
		);

		$this->db->insert('user', $data);

		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function editBook($bookid){
		$data = array(
			'TITLE'		=> $this->input->post('title'),
			'PUBLISHER'	=> $this->input->post('publisher'),
			'WRITER'	=> $this->input->post('writer'),
			'YEAR'		=> $this->input->post('year'),
			'QUANTITY'	=> $this->input->post('quantity'),
		);

		$this->db->where('ID_BUKU', $bookid)
				->update('buku',$data);

		if($data['QUANTITY'] == 0){
			$data = array(
				'STATUS' => 'UNAVAILABLE',
			);
			$this->db->where('ID_BUKU', $bookid)
					->update('buku',$data);
		}

		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function editBookCover($foto,$bookid){
		$data = array(
			'FOTO'	=> $foto['file_name'],
		);
		$this->db->where('ID_BUKU', $bookid)
				->update('buku',$data);

		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function editUser($userid){
		$data = array(
			'USERNAME'	=> $this->input->post('username'),
			'PASSWORD'	=> $this->input->post('password'),
			'NAME'		=> $this->input->post('name'),
			'EMAIL'		=> $this->input->post('email'),
			'PHONE'		=> $this->input->post('phone'),
		);

		$this->db->where('ID_USER', $userid)
				->update('user',$data);

		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function deleteUser($userid){
		$this->db->where('ID_USER', $userid)
				->delete('user');

		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function deleteBook($bookid){
		$this->db->where('ID_BUKU', $bookid)
				->delete('buku');

		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}
}

/* End of file m_admin.php */
/* Location: ./application/models/m_admin.php */