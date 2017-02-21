<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		Autenticado();     
	}

	public function index()
	{


		// Dados para o Dashboard
			
			// Total de Projetos
				$this->load->model('projetos_model');
				$projetos_count = $this->projetos_model->get_total();


		$data = array(
			'page'=>'home',
			'title'=>'',
			'subtitle'=>'',
			'projetos_count'=>$projetos_count
		);

		$this->load->view('_layout', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */