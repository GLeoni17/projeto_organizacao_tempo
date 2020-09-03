<!--html-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Titulo</title>
        <script>
            function muda_texto(id){
                alert(document.getElementById(id).value);
            }
        </script>
        <style>
            form{
                text-align: center;
                background-color: aquamarine;
            }
        </style>
    </head>
    <body>
        <h1>h1</h1>
        <h2>h2</h2>
        <h3>h3</h3>
        <h4>h4</h4>
        <p>paragrafo</p>
        <form>
            <input type="color">
            <?php
                for($i=0; $i<3; $i++){
                    echo "<input id=".$i." onclick=\"muda_texto(this.id)\" type=\"text\">";
                }
            ?>
        </form>
    </body>
</html>