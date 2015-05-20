
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Quiz_model extends CI_Model {
 
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
 
   
     function inserir($data) {
       return $this->db->insert('acoes', $data);
    }
 
    function inserirresposta($dados) {
       return $this->db->insert('respostas', $dados);
    }

	function listar() {
        $this->db->select('acoes.nome, acoes.id, acoes.tipo, acoes.objetivopedagogico, tema.id as tema_id, tema.nome as tema');
        $this->db->from('acoes');
        $this->db->join('tema', 'acoes.tema_id = tema.id');
        $this->db->where('tipo', 'Q');
        $query = $this->db->get();
      //  var_dump($query->result());
        return $query->result();
  
    }

      function atualizar($data) {
        $id=$data['id'];
       $this->db->where('id', $id);
       return $this->db->update('acoes', $data);
    }

    function atualizarresposta($dados) {
        $id=$dados['id'];
        $this->db->where('id', $id);
       return $this->db->update('respostas', $dados);
    }
}