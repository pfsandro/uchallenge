
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Coordenadas_model extends CI_Model {
 
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
 
    function inserircoordenadas($dados) {
        return $this->db->insert('coordmapa',$dados);
        #$data['coordmapa_id']= $this->db->insert_id();
       
    }

     function inserircoordenadasacoes($data) {
       $id=$data['id'];
       $this->db->where('id', $id);
       return $this->db->update('acoes', $data);

    }

    function inserirjogos_acoes($data1) {
       return $this->db->insert('jogos_acoes', $data1);

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