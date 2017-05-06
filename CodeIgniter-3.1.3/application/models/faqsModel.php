<?php
    class faqsModel extends CI_Model {
        function __construct() { 
         parent::__construct(); 
      }
      
      public function getFaqs($lingua = 'portugues'){
        $this->load->database();
        $query=$this->db->select('*')
                    ->from('faqs')
                    ->where('lingua', $lingua)
                    ->get();
        $this->db->close();
        return $query->result();
      }
    }
?>