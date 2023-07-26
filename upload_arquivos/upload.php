<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
</head>
<style>
    body{
        background-color: gainsboro;
    }
</style>
<body>
    <form action="upload.php" method="POST" 
    enctype="multipart/form-data">
        <input type="file" name="arquivo">
        <button type="submit" name= "botao_enviar">Enviar</button>
    </form>
    
</body>
</html>

<?php
    if(isset($_POST['botao_enviar'])){
        $tipos_permitidos = ['jpg', 'jpeg', 'gif', 'png', 'JPG',
        'JPEG', 'GIF', 'PNG'];

        $extensao = pathinfo($_FILES['arquivo']['name'],
         PATHINFO_EXTENSION);

         // VER SE O TIPO DE ARQUIVO EXISTE
        if(in_array($extensao, $tipos_permitidos)){
            $pasta = "arquivos/";
            $temporario = $_FILES['arquivo']['tmp_name'];
            $novo_nome = uniqid().".$extensao";

            // fazer upload
            if(move_uploaded_file($temporario, $pasta.
            $novo_nome)){
                echo "<p>Upload realizado!</p>";
            }else{
                echo "<p>Falha no upload!</p>";
            }//fim upload
            
        }else{
            echo "<p> Tipo do arquivo não é permitido</p>";
        }//fim do array

    }//fim if isset


?>