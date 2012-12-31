<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class contact_model extends CI_Model {
	
	public function getContactRow()
	{
		$query = $this->db->select('*')->from('contact')->where('id',1)->get();
		
		if($query->num_rows()>0)
		{
			$row_array = array(
								'address'	=> $query->row()->address,
								'phone'		=> $query->row()->phone,
								'fax'		=> $query->row()->fax,
								'email'		=> $query->row()->email
							  );
			return $row_array;				  
		}
		else
		{
			return FALSE;
		}
		
	}
	
	
	public function updateContact($address, $phone, $fax, $email)
	{
		$data = array(
						'address' 	=> $address,
						'phone'		=> $phone,
						'fax'		=> $fax,
						'$email'	=> $email
					 );
		
		$query = $this->db->where('id',1);
		$query = $this->db->update('contact',$data);
		
		if($query)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}			
					 
	}

	
}