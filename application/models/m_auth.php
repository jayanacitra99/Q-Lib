<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model {

	public function login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$query = $this->db->where('USERNAME',$username)
					->where('PASSWORD',$password)
					->get('user');

		if($query->num_rows() > 0){
			$data = array(
				'username' => $username,
				'logged_in'=> TRUE
			);
			$this->session->set_userdata($data);

			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function getDataUser($username){
		return $this->db->where('username', $username)
						->get('user')
						->row();
	}

	public function registerUser(){
		$data = array(
			'USERNAME'	=> $this->input->post('username'),
			'PASSWORD'	=> $this->input->post('password'),
			'NAME'		=> $this->input->post('name'),
			'EMAIL'		=> $this->input->post('email'),
			'PHONE'		=> $this->input->post('phone'),
			'ROLE'		=> 'USER',
		);

		$this->db->insert('user', $data);

		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}

}

/* End of file m_auth.php */
/* Location: ./application/models/m_auth.php */