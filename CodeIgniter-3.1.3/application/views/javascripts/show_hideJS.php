
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