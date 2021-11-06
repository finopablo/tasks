<html>
    <head>
        <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
       
    </head>
        
    <body>
<div id="contenedor" style="color:#000;"></div>

<span id="cargando" style="display:none;">
    Cargando...
</span>

<div id="cargar" style="background-color:#999; cursor:hand;">
    Cargar contenido de ajax
</div>

<script type="text/javascript">
                    $(document).ready(function(){
                        $("#cargar").click(function(){
                                $.get("standbypage.php", { id : 5, name : "Pablo"}, function(data){
                                   $("#contenedor").html(data);
                                } )


                        });
                    });
        </script>
</body>
</html>