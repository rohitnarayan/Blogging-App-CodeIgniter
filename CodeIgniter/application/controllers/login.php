<?php 
	class Login extends MY_Controller
	{
		public function index()
		{
			if($this->session->userdata('user_id'))
				return redirect('admin/articles');

			$this->load->view('public/loginPage');
		}
		public function public_login()
		{
			if($this->session->userdata('user_id'))
				return redirect('admin/articles');

			$this->load->library('form_validation');

			// $this->form_validation->set_error_delimeters("<p class='text-danger'>","</p>");

			$this->form_validation->set_rules('username','Username','required|alpha');
			$this->form_validation->set_rules('password','Password','required');

			if($this->form_validation->run())
			{
				$username = $this->input->post('username');
				$password = $this->input->post('password');

				$this->load->model('loginmodel');

				$user_id = $this->loginmodel->login_valid($username,$password);

				if($user_id)
				{
					$this->load->library('session');
					$this->session->set_userdata('user_id',$user_id);

					return redirect('admin/articles');
				}
				else
				{
					$this->session->set_flashdata('login_failed','Invalid Username/Password.Please Enter correct details.');
					$this->load->view('public/loginPage');
				}
			}
			else
			{
				$this->load->view('public/loginPage');
			}
		}
		public function logout()
		{
			$this->session->unset_userdata('user_id');
			return redirect('login');
		}
	}
 ?>