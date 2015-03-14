<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		$this->load->model('usuarios');

		var_dump($this->usuarios->listar());

		$data = array(
			'message' => "Hello World"
		);
		$this->load->view('main', $data);
	}

	public function login($error='')
	{
		$data = array(
			'error' => ''
		);

		if (strlen($error) > 0) {
			$data['error'] = "Erro de autenticação!";
		}

		$this->load->view('main_login',$data);
	}

	public function checkLogin()
	{
		$where = array(
			'nome' => $this->input->post('nome'),
			'senha' => $this->input->post('senha')
		);

		var_dump($where);

		$this->load->database();
		$logado = $this->db->get_where('usuario', $where)->result_array();

		if($logado[0]['id'] > 0) {
			redirect('/professor/');
		} else {
			redirect('/main/login/error');
		}
	}

}

/* End of file main.php */
/* Location: ./application/controllers/main.php */