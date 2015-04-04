<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Professor extends CI_Controller {
 
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
 
    public function index() {
        $data['titulo'] = "Cadastro de jogos";
 
        $this->load->view('professor.php', $data);
    }

	public function area(){
		$this->load->library('form_validation');	
		$this->load->view('professor_area');
	}

	public function tema(){
		$this->load->library('form_validation');	
		$this->load->view('professor_tema');
	}
	public function areaavalia(){
		$this->load->library('form_validation');	
		$this->load->view('professor_areaavalia');
	}
	public function jogo(){
		$this->load->library('form_validation');	
		$dados = array(
			'areasc'=> $this->db->get('areaconhecimento')->result(),
			'areasa'=> $this->db->get('areaavaliacao')->result(),
			'temas' => $this->db->get('tema')->result(),
		);	

		$this->load->view('professor_jogo',$dados);
		
	}

	public function inserirarea() {
 
	/* Carrega a biblioteca do CodeIgniter responsável pela validação dos formulários */

		$this->load->library('form_validation');
 
	/* Define as tags onde a mensagem de erro será exibida na página */
		$this->form_validation->set_error_delimiters('<span>', '</span>');
 
	/* Define as regras para validação */
		$this->form_validation->set_rules('nome', 'Nome', 'required|max_length[40]');
	
 
	/* Executa a validação e caso houver erro... */
		if ($this->form_validation->run() === FALSE) {
		/* Chama a função index do controlador */
			$this->index();
	/* Senão, caso sucesso na validação... */	
		} else {
		/* Recebe os dados do formulário (visão) */
			$data['nome'] = $this->input->post('nome');
		
 		/* Carrega o modelo */
			$this->load->model('area_model');
 
		/* Chama a função inserir do modelo */
			if ($this->area_model->inserir($data)) {
				redirect('professor');
			} else {
				log_message('error', 'Erro ao inserir a area.');
			}
		}
	}
	public function inserirtema() {
 
	/* Carrega a biblioteca do CodeIgniter responsável pela validação dos formulários */

		$this->load->library('form_validation');
 
	/* Define as tags onde a mensagem de erro será exibida na página */
		$this->form_validation->set_error_delimiters('<span>', '</span>');
 
	/* Define as regras para validação */
		$this->form_validation->set_rules('nome', 'Nome', 'required|max_length[40]');
	
 
	/* Executa a validação e caso houver erro... */
		if ($this->form_validation->run() === FALSE) {
		/* Chama a função index do controlador */
			$this->index();
	/* Senão, caso sucesso na validação... */	
		} else {
		/* Recebe os dados do formulário (visão) */
			$data['nome'] = $this->input->post('nome');
		
 		/* Carrega o modelo */
			$this->load->model('tema_model');
 
		/* Chama a função inserir do modelo */
			if ($this->tema_model->inserir($data)) {
				redirect('professor');
			} else {
				log_message('error', 'Erro ao inserir tema.');
			}
		}
	}
	public function inserirareaavalia() {
 
	/* Carrega a biblioteca do CodeIgniter responsável pela validação dos formulários */

		$this->load->library('form_validation');
 
	/* Define as tags onde a mensagem de erro será exibida na página */
		$this->form_validation->set_error_delimiters('<span>', '</span>');
 
	/* Define as regras para validação */
		$this->form_validation->set_rules('nome', 'Nome', 'required|max_length[40]');
	
 
	/* Executa a validação e caso houver erro... */
		if ($this->form_validation->run() === FALSE) {
		/* Chama a função index do controlador */
			$this->index();
	/* Senão, caso sucesso na validação... */	
		} else {
		/* Recebe os dados do formulário (visão) */
			$data['nome'] = $this->input->post('nome');
		
 		/* Carrega o modelo */
			$this->load->model('areaavalia_model');
 
		/* Chama a função inserir do modelo */
			if ($this->areaavalia_model->inserir($data)) {
				redirect('professor');
			} else {
				log_message('error', 'Erro ao inserir tema.');
			}
		}
	}
	public function inserirjogo() {
 
	/* Carrega a biblioteca do CodeIgniter responsável pela validação dos formulários */

		$this->load->library('form_validation');
 
	/* Define as tags onde a mensagem de erro será exibida na página */
		$this->form_validation->set_error_delimiters('<span>', '</span>');
 
	/* Define as regras para validação */
		$this->form_validation->set_rules('nome', 'Nome', 'required|max_length[40]');
	
 
	/* Executa a validação e caso houver erro... */
		if ($this->form_validation->run() === FALSE) {
		/* Chama a função index do controlador */
			$this->index();
	/* Senão, caso sucesso na validação... */	
		} else {
		/* Recebe os dados do formulário (visão) */
			$data['nome'] = $this->input->post('nome');
		
 		/* Carrega o modelo */
			$this->load->model('jogo_model');
 
		/* Chama a função inserir do modelo */
			if ($this->jogo_model->inserir($data)) {
				redirect('professor');
			} else {
				log_message('error', 'Erro ao inserir tema.');
			}
		}
	}
	

}