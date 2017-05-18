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

function loadFaqs() {
  var xhttp = new XMLHttpRequest();
  ling = document.getElementById("comb1").value;
  var url = '<?php echo base_url();?>' +"/Faqs?ling=" + ling;
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById(idtag).innerHTML = this.responseText;
      
      console.log(url);
      document.getElementById('id01').style.display='block';
    }
  };
  
  xhttp.open("GET", url, true);
  xhttp.send();
}
</script>




