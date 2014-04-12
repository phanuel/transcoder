<?php

class Index extends CI_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->library('code_factory');
    }

    public function index() {
        if ($this->input->is_ajax_request()) {
            try {
                $codeName = (isset($_GET['code'])) ? $_GET['code'] : "Morse";
                $code = $this->code_factory->create($codeName);
                
                $input = $_GET['input'];
                $result = Array("result" => $code->transcode($input));

                $this->output->set_content_type('application/json');
                $this->output->set_output(json_encode($result));
            }catch (Exception $e) {
                $this->_helper->json($e->getMessage());
            }
        }else {
            try {
                $codeName = (isset($_GET['code'])) ? $_GET['code'] : "Morse";
                $code = $this->code_factory->create($codeName);
                
                $input = (isset($_GET['input'])) ? $_GET['input'] : "";
                    
                $data['message'] = $code->getMessage();
                $data['code'] = $codeName;
                $data['input'] = $input;
                
                $layoutData['description'] = $code->getSubtitle();
                $layoutData['content'] = $this->load->view('index/index', $data, true);

                $this->load->view('layouts/layout', $layoutData);
            }catch (Exception $e) {
                $data['exception'] = $e->getMessage();
                $layoutData['content'] = $this->load->view('index/index', $data, true);
                $this->load->view('layouts/layout', $layoutData);
            }
        }
    }

}

?>
