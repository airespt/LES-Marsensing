
<head>
</head>
<script language="javascript">
            var name = "";

            function show_hide(name1, name2) {
                    document.getElementById(name2).style.display="none";
                    document.getElementById(name1).style.display="block";
                if(name1 === "button_comparator") {
                    StopPLayer();
                }
            }
            function show(name1){
                document.getElementById(name1).style.display="block";
            }
            function hide(name1){
                document.getElementById(name1).style.display="none";
            }
        </script>