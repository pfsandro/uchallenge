
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Jogo_model extends CI_Model {
 
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
 
    function inserir($data) {
        return $this->db->insert('jogos', $data);
    }
 
	function listar() {
		$query = $this->db->get('jogos');
		return $query->result();
	}
}