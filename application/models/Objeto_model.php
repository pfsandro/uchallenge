
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Objeto_model extends CI_Model {
 
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
 
    function inserir($dados) {
        return $this->db->insert('objaprendizagem', $dados);
    }
 
	function listar() {
		$query = $this->db->get('objaprendizagem');
		return $query->result();
	}
}