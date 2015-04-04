
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Area_model extends CI_Model {
 
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
 
    function inserir($data) {
        return $this->db->insert('areaconhecimento', $data);
    }
 
	function listar() {
		$query = $this->db->get('areaconhecimento');
		return $query->result();
	}
}