
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 6/24/2017
 * Time: 1:33 PM
 */
<head>
</head>
<script language="javascript">
            var name = "";

            function show_hide(name) {
                if(name === "button_player") {
                    document.getElementById("button_comparator").style.display="none";
                    document.getElementById("button_player").style.display="block";

                }

                if(name === "button_comparator") {
                    document.getElementById("button_player").style.display = "none";
                    document.getElementById("button_comparator").style.display = "block";
                }
            }
        </script>