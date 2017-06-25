<?php
    //Devolve informaçao relativa ao FAQS
    
    class faqsModel extends CI_Model {
        function __construct() { 
            parent::__construct(); 
        }
        
        //Devolve todas os pares  pergunta/resposta na lingua escolhida
        //Por omissao a lingua é portugues
        public function getFaqs($lingua = 'portugues'){
            $idioma= $lingua == 'portugues' ? 1 : 2;
            $this->load->database();
            $query=$this->db->select('pergunta, resposta')
                    ->from('perguntas')
                    ->where('idi_id', $idioma)
                    ->get();
            $this->db->close();
            return $query->result();
        }
        
        public function insertQuestion($email= 'teste$mail', $questao = 'O porque????'){
            $this->load->database();
            $data = array('email' => $email,'pergunta_pa' => $questao);
            $this->db->insert('pabertas', $data);
            $this->db->close();
        }
    }
?>