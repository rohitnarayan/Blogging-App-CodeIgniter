<?php

class Admin extends MY_Controller
{
	public function index()
	{
		$this->load->view('public/loginPage');
	}

	public function articles()
	{
		$this->load->library('pagination');

		$config = [
				'base_url'			=> 	base_url('index.php/admin/articles'),
				'per_page'			=> 	5,
				'total_rows'		=> 	$this->articlesmodel->num_rows(),
				'full_tag_open' 	=> 	"<ul class='pagination'>",
				'full_tag_close'	=>	"</ul>",
				'next_tag_open'		=>	"<li>",
				'first_tag_close'	=>	"</li>",
				'first_tag_open'		=>	"<li>",
				'last_tag_close'	=>	"</li>",
				'last_tag_open'		=>	"<li>",
				'next_tag_close'	=>	"</li>",
				'prev_tag_open'		=>	"<li>",
				'prev_tag_close'	=>	"</li>",
				'num_tag_open'		=>	"<li>",
				'num_tag_close'		=>	"</li>",
				'cur_tag_open'		=>	"<li class='active'><a>",
				'cur_tag_close'		=>	"</a></li>",
		];

		$this->pagination->initialize($config);
		
		$articles = $this->articlesmodel->articles_list($config['per_page'], $this->uri->segment(3));

		$this->load->view('admin/articles_list',['articles'=>$articles]);
	}

	public function add_article()
	{
		$this->load->view('admin/add_article');
	}

	public function store_article()
	{
		if($this->form_validation->run('add_article_rules'))
		{
			$post = $this->input->post();
			
			unset($post['submit']);

			$this->_setFlashDataAndRedirect($this->articlesmodel->add_article($post), 'Your article was added successfully!','Failed to add article.');
		}
		else
		{
			$this->load->view('admin/add_article');
		}
	}

	public function edit_article($articles_id)
	{
		$article = $this->articlesmodel->find_article($articles_id);

		$this->load->view('admin/edit_article',['article'=>$article]);
		
	}
	public function update_article($article_id)
	{
		if($this->form_validation->run('add_article_rules'))
		{
			$post = $this->input->post();

			unset($post['submit']);

			$this->_setFlashDataAndRedirect($this->articlesmodel->update_article($article_id,$post), 'Your article was updated successfully!','Failed to update article.');
		}
		else
		{
			$this->load->view('admin/add_article');
		}
	}

	public function delete_article()
	{
		// print_r($this->input->post());

		$article_id = $this->input->post('article_id');

		$this->_setFlashDataAndRedirect($this->articlesmodel->delete_article($article_id), 'Your article was deleted successfully!','Failed to delete article.');
	}

	private function _setFlashDataAndRedirect($successfull, $success, $failure)
	{
		if($successfull)
		{
			$this->session->set_flashdata('feedback',$success);
			$this->session->set_flashdata('feedback_class','alert-success');
		}
		else
		{
			$this->session->set_flashdata('feedback_class','alert-danger');
			$this->session->set_flashdata('feedback',$failure);
		}
		return redirect('admin/articles');
	}

	public function __construct()
	{
		parent::__construct();

		if(!$this->session->userdata('user_id'))
			return redirect('user'); 

		$this->load->model('articlesmodel');
		$this->load->library('form_validation');
	}
}