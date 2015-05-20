<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends CI_Controller {

    public function index()
    {
    	// All method return a 404 - Not Found
		$this->load->library('webapi');
		$this->webapi->run();
    }

    public function login()
    {
        $ci = $this;
        $this->load->library('webapi');

        $this->webapi->method('options', function() {
            return array();
        });

        $this->webapi->method('post', function() use ($ci) {
            $logado = 0;
            $nome = NULL;
            $nivel = NULL;

            $ci->load->database();

            $query = $ci->db->get_where('usuario', array(
                'nome' => $ci->input->post('nome'),
                'senha' => $ci->input->post('senha')
            ));

            foreach ($query->result() as $usuario) {
                $logado = 1;
                $nome = $usuario->nome;
                $nivel = $usuario->nivel;
            }

            return array(
                'logado' => $logado,
                'nome' => $nome,
                'nivel' => $nivel
            );
        });

		$this->webapi->run();
    }

}

/* End of file Api.php */
/* Location: ./application/controllers/Api.php */