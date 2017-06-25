<!--
/** Created by PhpStorm.
 * User: Daniel
 * Date: 17-05-2017
 * Time: 22:00
 * To be called from CodeIgniter via template parser (as view).
 * This script updates the "MODEL" and activate it
 */
-->
<head>
</head>

<script language="javascript" type="text/javascript">


//var ling = "portugues";
//var ling = document.getElementById("comb1").value;

var idtag = "id03";
var xhttpfaqs = new XMLHttpRequest();
xhttpfaqs.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById(idtag).innerHTML = this.responseText;
      
      console.log(url);
      document.getElementById('id01').style.display='block';
    }
};

var xhttpinsert = new XMLHttpRequest();
xhttpinsert.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      //document.getElementById(idtag).innerHTML = this.responseText;
      
      alert("questão enviada");
      document.getElementById('mail').value="Email";
      document.getElementById('pergunta').value="Message";
    }
};



function insertFaqs(){
    //por acabar
    var email = document.getElementById('mail').value;
    var pergunta = document.getElementById('pergunta').value;
    console.log(email);
    var url = '<?php echo base_url();?>' + "/Insertao?email=" + email + "&questao=" + pergunta;
    xhttpinsert.open("GET", url, true);
    xhttpinsert.send();
}



function loadFaqs() {
  
  ling = document.getElementById("comb1").value;
  var url = '<?php echo base_url();?>' +"/Faqs?ling=" + ling;
  
  
  xhttpfaqs.open("GET", url, true);
  xhttpfaqs.send();
}
</script>




