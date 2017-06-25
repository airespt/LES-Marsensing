<?php
    //contrulador que envia as questões submetidas para o modelo faqsModel para serem inseridas na base de dados.
    // o controlador resebe por get os camposs email e Questao
    class Insertao extends CI_Controller {
        public function index(){
            $email = $this->input->get('email');
            $questao  = $this->input->get('questao');
            echo $email;
            //echo " | ";
            //echo $dend;
            //$this->load->model('zonaModel');
            $this->load->model('faqsModel');
        //$query = $this->faqsModel->getFaqs('ingles');
            //$query = $this->zonaModel->getPlayerframes('1980-01-01 00:00:00', '2025-01-01 00:00:00');
            $response = $this->faqsModel->insertQuestion($email, $questao);
            //echo getPlayerframes($dts, $dte);
            echo $response;
        }
    }



?>