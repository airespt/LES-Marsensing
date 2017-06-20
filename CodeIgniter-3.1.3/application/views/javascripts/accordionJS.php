<!--
 * Created by PhpStorm.
 * User: Nikita
 * Date: 6/20/2017
 * Time: 8:14 PM
 -->
<head>
</head>

<script language="javascript" type="text/javascript">
    function accordion(id) {
        var x = document.getElementById(id);
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
        } else {
            x.className = x.className.replace(" w3-show", "");
        }
    }
</script>