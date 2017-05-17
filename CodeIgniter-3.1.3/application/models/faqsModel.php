<?php
    //Devolve informaçao relativa ao FAQS
    class faqsModel extends CI_Model {
        function __construct() { 
            parent::__construct(); 
        }
        
        //Devolve todas os pares  pergunta/resposta na lingua escolhida
        //Por omissao a lingua é portugues
        public function getFaqs($lingua = 'portugues'){
            $this->load->database();
            $query=$this->db->select('pergunta, resposta')
                    ->from('faqs')
                    ->where('lingua', $lingua)
                    ->get();
            $this->db->close();
            return $query->result();
        }
    }
?>