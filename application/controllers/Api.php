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

    public function jogos()
    {
        $ci = $this;
        $this->load->library('webapi');

        $this->webapi->method('get', function() use ($ci) {
            $ci->load->database();
            $query = $ci->db->get('jogos');
            return $query->result_array();
        });

        $this->webapi->run();
    }

    public function jogoambiente($id)
    {
        $ci = $this;
        $this->jogo_id = $id;
        $this->load->library('webapi');

        $this->webapi->method('get', function() use ($ci) {
            $ci->load->database();
            $ci->db->select('coordmapa.latitude as lat, coordmapa.longitude as lng, coordmapa.zoom as zoom');
            $ci->db->join('coordmapa', 'jogos.coordmapa_id = coordmapa.id');
            $query = $ci->db->get_where('jogos', array('jogos.id' => $ci->jogo_id));
            $jogo = $query->result_array();

            $ci->db->select('acoes.id as id, coordmapa.latitude as lat, coordmapa.longitude as lng');
            $ci->db->join('jogos_acoes', 'acoes.id = jogos_acoes.acoes_id');
            $ci->db->join('coordmapa', 'acoes.coordmapa_id = coordmapa.id', 'left');
            $query = $ci->db->get_where('acoes', array(
                'acoes.tipo' => 'D',
                'jogos_acoes.jogos_id' => $ci->jogo_id
            ));

            $jogo[0]['desafios'] = $query->result_array();

            return $jogo[0];
        });

        $this->webapi->run();
    }

}

/* End of file Api.php */
/* Location: ./application/controllers/Api.php */