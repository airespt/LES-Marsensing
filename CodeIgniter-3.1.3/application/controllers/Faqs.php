<?php
    class Faqs extends CI_Controller {
        //Devolve as perguntas e respostas vindas para o idioma escolhido
        //Recebe a lingua atraves de GET no argumento 'ling'
        //Utiliza o view template_faqs
        //Por omissao o idioma é portugues
        public function index(){
            $this->load->model('faqsModel');
            $ling = $this->input->get('ling');
            $query = $this->faqsModel->getFaqs($ling);
            
            $template = $this->load->view('template_faqs', '', TRUE);
            $temp="";
            foreach ($query as $item)
                $temp  .= $this->parser->parse_string($template, $item, TRUE);
            
            echo $temp;
        }
    }

?>