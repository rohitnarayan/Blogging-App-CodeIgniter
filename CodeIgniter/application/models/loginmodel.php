<?php 
	class Loginmodel extends CI_Model
	{
		public function login_valid($username, $password)
		{
			$q = $this->db->where(['username'=>$username,'pword'=>$password])->get('users');

			if($q->num_rows())
			{
				return TRUE;
			}
			else
			{
				return FALSE;
			}
		}
	}
 ?>