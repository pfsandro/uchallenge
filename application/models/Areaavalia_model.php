
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Areaavalia_model extends CI_Model {
 
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
 
    function inserir($data) {
        return $this->db->insert('areaavaliacao', $data);
    }
 
	function listar() {
		$query = $this->db->get('areaavaliacao');
		return $query->result();
	}
}