
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
        $tipo="Q";
        $query = $this->db->get_where('acoes', array('tipo'=>$tipo));
        return $query->result();

     
    }
}