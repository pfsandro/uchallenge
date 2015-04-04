
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Tema_model extends CI_Model {
 
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
 
    function inserir($data) {
        return $this->db->insert('tema', $data);
    }
 
	function listar() {
		$query = $this->db->get('tema');
		return $query->result();
	}
}