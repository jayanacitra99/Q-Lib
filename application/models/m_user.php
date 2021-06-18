<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

	public function getNewBooks(){
		return $this->db->order_by('ID_BUKU', 'DESC')
						->get('buku')
						->result();
	}	

	public function getAllBooks(){
		return $this->db->order_by('ID_BUKU', 'ASC')
						->get('buku')
						->result();
	}

	public function getInfoBook($bookid){
		return $this->db->where('ID_BUKU',$bookid)
						->get('buku')
						->row();
	}

	public function getLastRent(){
		return $this->db->order_by('ID_TRANSACTION', 'DESC')
						->join('buku', 'buku.ID_BUKU = transaction.ID_BUKU')
						->get('transaction')
						->result();
	}

	public function getOnYou($username){
		return $this->db->order_by('ID_TRANSACTION', 'DESC')
						->join('buku', 'buku.ID_BUKU = transaction.ID_BUKU')
						->join('user', 'user.ID_USER = transaction.ID_USER')
						->where('USERNAME',$username)
						->where('transaction.STATUS','WAITING')
						->get('transaction')
						->result();
	}

	public function getMyTransaction($username,$bookid){
		return $this->db->select('*')
						->join('buku', 'buku.ID_BUKU = transaction.ID_BUKU')
						->join('user', 'user.ID_USER = transaction.ID_USER')
						->where('USERNAME',$username)
						->where('transaction.ID_BUKU',$bookid)
						->get('transaction')
						->row();
	}

	public function returnThisBook($userid,$bookid,$transid,$fine,$quan){
		$data = array(
			'STATUS'		=> 'FINISH',
			'FINE'			=> $fine,
			'RETURN_DATE'	=> date('Y-m-d')
		);
		$this->db->where('ID_BUKU', $bookid)
				->where('ID_USER', $userid)
				->where('ID_TRANSACTION', $transid)
				->update('transaction', $data);

		$data =  array(
			'QUANTITY'	=> $quan+1
		);
		$this->db->where('ID_BUKU',$bookid)
				->update('buku',$data);

		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function rentBook($bookid,$userid,$quan){
		$return = date('Y-m-d');
		$temp = intval($return[8].$return[9]);
		$temp = $temp + 7;
		if($temp > 9){
			$temp2 = strval($temp);
			$return[8] = $temp2[0];
			$return[9] = $temp2[1];
			if($temp > 30){
				$temp = $temp - 30;
				$temp2 = strval($temp);
				$return[8] = $temp2[0];
				$return[9] = $temp2[1];
				$temp3 = intval($return[5].$return[6]);
				$temp3 = $temp3 + 1;
				if($temp3 <= 12){
					if($temp3 > 9){
						$temp4 = strval($temp3);
						$return[5] = '1';
						$return[6] = $temp4[1];
					} else {
						$temp4 = strval($temp3);
						$return[5] = '0';
						$return[6] = $temp4[0];
					}
				} else {
					$return[5] = '0';
					$return[5] = '1';
					$temp5 = intval($return[3]);
					$temp5 = $temp5+1;
					$temp5 = strval($temp5);
					$return[3] = $temp5[0];
				}
			}
		} else {
			$temp2 = strval($temp);
			$return[8] = '0';
			$return[9] = $temp2[0];
		}
		$data = array(
			'ID_USER'		=> $userid,
			'ID_BUKU'		=> $bookid,
			'BORROW_DATE'	=> date('Y-m-d'),
			'END_DATE'		=> $return,
			'FINE'			=> 0,
			'STATUS'		=> 'WAITING'
		);
		$this->db->insert('transaction', $data);

		$data = array(
			'QUANTITY' => $quan-1,
		);
		$this->db->where('ID_BUKU', $bookid)
				->update('buku', $data);

		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function checkMember($userid){
		$query = $this->db->select('*')
						->where('ID_USER',$userid)
						->where('EXPIRED_TIME >=',date('Y-m-d'))
						->get('member');
		if($query->num_rows() > 0){
			return $query->row();
		} else {
			return 'NOT FOUND';
		}
	}

	public function checkTotalRent($userid){
		return $this->db->select('*')
						->where('ID_USER',$userid)
						->where('STATUS','WAITING')
						->get('transaction')
						->num_rows();
	}

	public function getMembership($userid,$member){
		if($member == 'SILVER'){
			$expired = date('Y-m-d');
			$todayday = intval(date('d')) + 7;
			if($todayday > 30){
				$todaymonth = intval(date('m')) + 1;
				if($todaymonth > 12){
					$todayyear = strval(intval(date('Y')) + 1);
					$expired[0] = $todayyear[0];
					$expired[1] = $todayyear[1];
					$expired[2] = $todayyear[2];
					$expired[3] = $todayyear[3];
					$expired[5] = '0';
					$expired[6] = '1';
					$todayday = $todayday - 30;
					$expired[8] = '0';
					$expired[9] = $todayday[0];

				} else if ($todaymonth <10){
					$todaymonth = strval($todaymonth);
					$expired[5] = '0';
					$expired[6] = $todaymonth[0];
					$todayday = $todayday - 30;
					$todayday = strval($todayday);
					$expired[8] = '0';
					$expired[9] = $todayday[0];
				} else {
					$todaymonth = strval($todaymonth);
					$expired[5] = $todaymonth[0];
					$expired[6] = $todaymonth[1];
					$todayday = $todayday - 30;
					$todayday = strval($todayday);
					$expired[8] = '0';
					$expired[9] = $todayday[0];
				}
			} else if($todayday < 10){
				$todayday = strval($todayday);
				$expired[8] = '0';
				$expired[9] = $todayday[0];
			} else {
				$todayday = strval($todayday);
				$expired[8] = $todayday[0];
				$expired[9] = $todayday[1];
			}
		} else if ($member == 'GOLD'){
			$expired = date('Y-m-d');
			$todaymonth = intval(date('m')) + 1;
			if($todaymonth > 12){
				$todayyear = strval(intval(date('Y')) + 1);
				$todaymonth = strval($todaymonth);
				$expired[0] = $todayyear[0];
				$expired[1] = $todayyear[1];
				$expired[2] = $todayyear[2];
				$expired[3] = $todayyear[3];
				$expired[5] = '0';
				$expired[6] = '1';
			} else if ($todaymonth < 10){
				$todaymonth = strval($todaymonth);
				$expired[5] = '0';
				$expired[6] = $todaymonth[0];
			} else {
				$todaymonth = strval($todaymonth);
				$expired[5] = $todaymonth[0];
				$expired[6] = $todaymonth[1];
			}
		} else if ($member == 'PLATINUM'){
			$expired = date('Y-m-d');
			$todayyear = strval(intval(date('Y')) + 1);
			$expired[0] = $todayyear[0];
			$expired[1] = $todayyear[1];
			$expired[2] = $todayyear[2];
			$expired[3] = $todayyear[3];
		}
		$data = array(	
			'ID_USER'		=> $userid,
			'MEMBER_TYPE'	=> $member,
			'JOIN_TIME'		=> date('Y-m-d'),
			'EXPIRED_TIME'	=> $expired
		);
		$this->db->insert('member',$data);

		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}

}

/* End of file m_user.php */
/* Location: ./application/models/m_user.php */