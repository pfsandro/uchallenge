
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
        $this->db->where('tipo', 'D');
        $this->db->or_where('tipo', 'P');
        $this->db->from('acoes');
        $this->db->join('tema', 'acoes.tema_id = tema.id');
        $query = $this->db->get();
        var_dump($query->result());
        return $query->result();

     
    }
}