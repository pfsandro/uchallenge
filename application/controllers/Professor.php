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
	public function objaprendizagem(){
		$this->load->library('form_validation');	
		$dados = array(
			'areasc'=> $this->db->get('areaconhecimento')->result(),
			'areasa'=> $this->db->get('areaavaliacao')->result(),
			'temas' => $this->db->get('tema')->result(),
		);	
		$this->load->view('professor_conteudo',$dados);
		
	}

	public function desafio(){
		$this->load->library('form_validation');	
		$dados = array(
			'areasc'=> $this->db->get('areaconhecimento')->result(),
			'areasa'=> $this->db->get('areaavaliacao')->result(),
			'temas' => $this->db->get('tema')->result(),
		);	

		$this->load->view('professor_desafio',$dados);
		
	}

	public function desafiol(){
		$this->load->model('desafio_model');
		$data['acoes'] = $this->desafio_model->listar();	
		$this->load->view('professor_desafio_listar',$data);
	}


	public function quiz(){
		$this->load->library('form_validation');	
		$dados = array(
			'areasc'=> $this->db->get('areaconhecimento')->result(),
			'areasa'=> $this->db->get('areaavaliacao')->result(),
			'temas' => $this->db->get('tema')->result(),
		);	

		$this->load->view('professor_quiz',$dados);
		
	}
	public function gerarqr($id=null){
		$this->db->where('id',$id);
		$data['acoes']=$this->db->get('acoes')->result();
		//var_dump($data['acoes']);
		$this->load->view('professor_qrcode',$data);
		
	}

	public function qrcode(){
		
		$this->load->view('professor_qrcode1');
		
	}
	//-------------------------------------------//----------------------------

	public function interacao($id){ //carrega informações referente a ação selecionada e os jogos com o mesmo tema da ação........
		$this->load->library('form_validation');

		// Colocar em uma model!
		$this->db->select('jogos.id, jogos.nome as jogo, jogos.tema_id, acoes.id as acoes_id, coordmapa.longitude, coordmapa.latitude, coordmapa.zoom');
		$this->db->join('coordmapa', 'jogos.coordmapa_id = coordmapa.id');
		$this->db->join('acoes', 'jogos.tema_id = acoes.tema_id');
		$this->db->where('acoes.id', $id);
		$query = $this->db->get('jogos');
		//var_dump($query->result());
		$dados = array(
			'jogos' => $query->result(),
		);	
		$this->load->view('professor_ponto_interacao',$dados);
	}

//-------------------------------Insere a ação selecionada no mapa do jogo --------------------------------------------
	public function inseririnteracao() {
 
		$dados['longitude']=$this->input->post('lng');
		$dados['latitude']=$this->input->post('lat');
		$dados['zoom']=$this->input->post('zoom');
					
 		/* Carrega o modelo */
		$this->load->model('coordenadas_model');
 		/* Chama a função inserir do modelo */
		if ($this->coordenadas_model->inserircoordenadas($dados)) {
			$data ['id']=$this->input->post('acoes_id');
			$data ['coordmapa_id']=$this->db->insert_id();
			if ($this->coordenadas_model->inserircoordenadasacoes($data)) {
				$data1 ['acoes_id']=$this->input->post('acoes_id');
				$data1 ['jogos_id']=$this->input->post('jogo_id');
				if ($this->coordenadas_model->inserirjogos_acoes($data1)) {
			 		redirect('professor/desafiol');
			    } else {
			log_message('error', 'Erro ao inserir coordenadas açoes.');
				}
			}	
		}
	}
	

	public function quizl(){
		$this->load->model('quiz_model');
		$data['acoes'] = $this->quiz_model->listar();	
		$this->load->view('professor_quiz_listar',$data);
	}


	public function excluirq($id=null){
		$this->db->where('acoes_id',$id);
		if($this->db->delete('respostas')){
			$this->db->where('id',$id);
    		if($this->db->delete('acoes')){
    			redirect ('professor/quizl');
    		}else{
    			redirect ('error');
    		}	
		}
	}
	public function alterarq($id){
	   $this->db->select('acoes.nome, acoes.id, acoes.tipo, acoes.objetivopedagogico, tema.id as tema_id, tema.nome as tema, acoes.id as acoes_id, respostas.id as resposta_id, respostas.verdadeira, respostas.resposta');
        $this->db->from('acoes');
        $this->db->join('tema', 'acoes.tema_id = tema.id');
        $this->db->join('respostas','respostas.acoes_id = acoes.id');
        $this->db->where('respostas.verdadeira', 1 );
        $this->db->where('acoes.id', $id);
        $data['acoes']=$this->db->get()->result();
        //var_dump($data['acoes']);
		$this->load->view('professor_quizalt',$data);

	}
	//--------------------Atualiza ações (quiz, perguntas e desafios)-----------------
	public function atualizarquiz(){

		$data ['id']=$this->input->post('id_quiz');
		$data ['nome']=$this->input->post('nome');
		$data ['objetivopedagogico']=$this->input->post('objpedagogico');
		
 		/* Carrega o modelo */
		$this->load->model('quiz_model');

			/* Chama a função inserir do modelo */

		 if ($this->quiz_model->atualizar($data)) {
		 	$dados ['id']=$this->input->post('resposta_id');
		 	$dados ['resposta']=$this->input->post('resposta');
		    $this->load->model('quiz_model');
		    if ($this->quiz_model->atualizarresposta($dados)){
				redirect('professor');
			} else {
				log_message('error', 'Erro ao inserir dessafio.');
				}
			}	
		}
	//---------------------------------------------//--------------------------------------------

	public function inserirobjeto() {
		$this->load->library('upload', array(
			'upload_path' => './upload',
			'allowed_types' => '*'
		));

		if (!$this->upload->do_upload()) {
			var_dump($this->upload->display_errors());
		} else {
			$resultado = $this->upload->data();
			//var_dump($resultado['file_name']);
			$dados ['formato']=$this->input->post('formato');
			$dados ['arquivo']=$resultado['file_name'];
			$dados ['areaavaliacao_id']=$this->input->post('idareaa');
			$dados ['tema_id']=$this->input->post('idtema');
			$dados ['areaconhecimento_id']=$this->input->post('idareac');
							
 		/* Carrega o modelo */
		$this->load->model('objeto_model');

		/* Chama a função inserir do modelo */

		 if ($this->objeto_model->inserir($dados)) {
		 		redirect('professor/objaprendizagem');
			} else {
				log_message('error', 'Erro ao inserir a area.');
			}
		}
	}
	//---------------------------------------------//--------------------------------------------
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
	//-------------------------------------//------------------------------------------------
	public function inserirtema() {
 
		$this->load->library('form_validation');
 		$this->form_validation->set_error_delimiters('<span>', '</span>');
		$this->form_validation->set_rules('nome', 'Nome', 'required|max_length[40]');
		if ($this->form_validation->run() === FALSE) {
			$this->index();
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
	//-------------------------------------//------------------------------------------------
	public function inserirareaavalia() {
 
		$this->load->library('form_validation');
 		$this->form_validation->set_error_delimiters('<span>', '</span>');
 		$this->form_validation->set_rules('nome', 'Nome', 'required|max_length[40]');
		if ($this->form_validation->run() === FALSE) {
			$this->index();
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

	//-------------------------------------//------------------------------------------------
	public function inserirjogo() {
 
	/* Carrega a biblioteca do CodeIgniter responsável pela validação dos formulários */

		#$this->load->library('form_validation');
 
	/* Define as tags onde a mensagem de erro será exibida na página */
		#$this->form_validation->set_error_delimiters('<span>', '</span>');
 
	/* Define as regras para validação */
		#$this->form_validation->set_rules('nome', 'Nome', 'required|max_length[40]');
		#$this->form_validation->set_rules('idtema', 'Tema', 'required|max_length[40]');
		#$this->form_validation->set_rules('idareac', 'areaconhecimento_id', 'required|max_length[40]');
		#$this->form_validation->set_rules('idareaa', 'Tema', 'required|max_length[40]');
		#$this->form_validation->set_rules('coordmapa', 'Tema', 'required|max_length[40]');
		
 
	/* Executa a validação e caso houver erro... */
		#if ($this->form_validation->run() === FALSE) {
		/* Chama a função index do controlador */
		#	$this->index();
	/* Senão, caso sucesso na validação... */	
		#} else {
		/* Recebe os dados do formulário (visão) */


		$dados['longitude']=$this->input->post('lng');
		$dados['latitude']=$this->input->post('lat');
		$dados['zoom']=$this->input->post('zoom');
					
 		/* Carrega o modelo */
		$this->load->model('jogo_model');
 		/* Chama a função inserir do modelo */
		if ($this->jogo_model->inserircoordenadas($dados)) {
			$data ['nome']=$this->input->post('nome');
			$data ['tema_id']=$this->input->post('idtema');
			$data ['areaavaliacao_id']=$this->input->post('idareaa');
			$data ['areaconhecimento_id']=$this->input->post('idareac');
			$data ['coordmapa_id']=$this->db->insert_id();
			 if ($this->jogo_model->inserir($data)) {
			 	redirect('professor');
			} else {
			log_message('error', 'Erro ao inserir jogo.');
			}
		}
	}
	//-------------------------------------//------------------------------------------------
	public function inserirdesafio() {
 
		$data ['nome']=$this->input->post('nome');
		$data ['tipo']=$this->input->post('tipo');
		$data ['objetivopedagogico']=$this->input->post('objpedagogico');
		$data ['areaavaliacao_id']=$this->input->post('idareaa');
		$data ['tema_id']=$this->input->post('idtema');
		$data ['areaconhecimento_id']=$this->input->post('idareac');
							
 		/* Carrega o modelo */
		$this->load->model('desafio_model');

		/* Chama a função inserir do modelo */

		 if ($this->desafio_model->inserir($data)) {
		 	$dados ['resposta']=$this->input->post('resposta');
		 	$dados ['verdadeira']="1";
		 	$dados ['acoes_id']=$this->db->insert_id();
		 	if ($this->desafio_model->inserirresposta($dados)){
				redirect('professor');
			} else {
				log_message('error', 'Erro ao inserir desafio.');
				}
			}	
		}
	//-------------------------------------//------------------------------------------------
		public function inserirquiz() {
		
			$data ['nome']=$this->input->post('nome');
			$data ['tipo']="Q";
			$data ['objetivopedagogico']=$this->input->post('objpedagogico');
			$data ['areaavaliacao_id']=$this->input->post('idareaa');
			$data ['tema_id']=$this->input->post('idtema');
			$data ['areaconhecimento_id']=$this->input->post('idareac');
			
 		/* Carrega o modelo */
			$this->load->model('quiz_model');

			/* Chama a função inserir do modelo */

			 if ($this->quiz_model->inserir($data)) {
			 	$id=$this->db->insert_id();
			 	$dados ['resposta']=$this->input->post('resposta');
			 	$dados ['verdadeira']="1";
			 	$dados ['acoes_id']="$id";
			 	if ($this->quiz_model->inserirresposta($dados)){
			 		$dados ['resposta']=$this->input->post('respostaf1');
			 		$dados ['verdadeira']="2";
			 		$dados ['acoes_id']="$id";
			 		if ($this->quiz_model->inserirresposta($dados)){
			 			$dados ['resposta']=$this->input->post('respostaf2');
			 			$dados ['verdadeira']="2";
			 			$dados ['acoes_id']="$id";
			 			if ($this->quiz_model->inserirresposta($dados)){
				redirect('professor');
				} else {
					log_message('error', 'Erro ao inserir dessafio.');
					}
			}	
		}}}
}