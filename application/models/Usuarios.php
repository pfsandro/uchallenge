<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function adicionar()
	{
		return false;
	}

	public function listar()
	{
		return $this->db->get('usuario')->result_array();
	}

	public function alterar()
	{
		return false;
	}

	public function remover()
	{
		return false;
	}

}

/* End of file usuarios.php */
/* Location: ./application/models/usuarios.php */