<?php
    class camadao extends CI_Controller {
        public function index(){
            $dstart = $this->input->get('dts');
            $dend  = $this->input->get('dte');
            //echo $dstart;
            //echo " | ";
            //echo $dend;
            //$this->load->model('zonaModel');
            $this->load->model('zonaModel');
        //$query = $this->faqsModel->getFaqs('ingles');
            //$query = $this->zonaModel->getPlayerframes('1980-01-01 00:00:00', '2025-01-01 00:00:00');
            $response = $this->zonaModel->getPlayerframes($dstart, $dend);
            //echo getPlayerframes($dts, $dte);
            echo $response;
        }
    }



?>