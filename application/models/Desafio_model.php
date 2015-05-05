
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Desafio_model extends CI_Model {
 
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
        $tipo="D";
        $tipo1="P";
        $query = $this->db->get_where('acoes', array('tipo'));
        return $query->result();

     
    }
}