
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Jogo_model extends CI_Model {
 
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
 
    function inserircoordenadas($dados) {
        return $this->db->insert('coordmapa',$dados);
        #$data['coordmapa_id']= $this->db->insert_id();
       
    }

     function inserir($data) {
       return $this->db->insert('jogos', $data);

    }

    function idjogo() {
        $query=$this->db->get('jogos');
        return $query->mysql_insert_id();
    }
 
	function listar() {
		$query = $this->db->get('jogos');
		return $query->result();

     
	}
}