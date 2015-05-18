<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Webapi
{
  protected $ci;

	public function __construct()
	{
        $this->ci =& get_instance();

    	$this->resource = $this->ci->uri->segment(1);
    	$this->method = $this->ci->input->server('REQUEST_METHOD');

        $this->http_code = '404';
    	$this->callback = function() {
    	    return array('error' => 'Not found');
    	};
	}

	public function method($method, $callback, $http_code='200') {
		if (strtolower($this->method) == strtolower($method)) {
            $this->http_code = $http_code;
            $this->callback = $callback;
        }
	}

	public function run() {
		$callback = $this->callback;
        $return = $callback();
        $this->response($return, $this->http_code);
	}

    private function response($array, $http_code='200') {

    	$headers = $this->ci->input->request_headers();

    	$this->ci->output->set_status_header($http_code);

	    switch ($headers['Accept']) {
	    		
	    	case 'application/xml':
				$this->ci->output->set_content_type('application/xml');
			    $output = $this->xml_encode($array, new SimpleXMLElement('<' . $this->resource . '/>'))->asXML();
	    		break;
	    		
	    	default:
				$this->ci->output->set_content_type('application/json');
			    $output = json_encode($array);
	    		break;
		}

		$this->ci->output->set_output($output);

    }

	private function xml_encode($array, $xml) {
	    foreach ($array as $k => $v) {
	        is_array($v)
	            ? array_to_xml($v, $xml->addChild($k))
	            : $xml->addChild($k, $v);
	    }
	    return $xml;
	}
}

/* End of file Webapi.php */
/* Location: ./application/libraries/Webapi.php */
