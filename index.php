<!DOCTYPE html>
<html lang="br">
  <head>
    <meta charset="utf-8">
    <title>Login</title>

    <link href="css/estilo.css" rel="stylesheet">
    <meta name="viewport" content="initial-scale=0.4">
    <meta name="theme-color" content="#333333"/>
    <meta name="description" content="test" />
    <meta name="keywords" content="testdnv"/>
    <meta name="robots" content="index, follow">
  </head>
  <body>
<form action="acesslogin.php" method="POST" />
    <div>
        <label for="UserName">UserName:</label><br>
        <input type="text" name="name" placeholder="Digite seu nome de usuario" id="UserName" autocomplete="on">
    </div>
    <div>
        <label for="Password">Password:</label><br>
        <input type="password" name="password" placeholder="Digite sua senha" id="Password" autocomplete="off">
    </div>

    <div id="error">
      <?php
        error_reporting(0);
        $_GET["id"];

        if ($_GET["id"]== null) {
          $_GET["id"] = 0;
        }
        switch ($_GET["id"]) {
            case '0':
                break;
            case '1':
                echo "Escreva seu nome de usuario";
                echo "!!!!!";
                break;
            case '2':
                echo "Digite sua senha";
                echo "!!!!!";
                break;
            case '3':
                echo "usuario nao encontrado";
                echo "!!!!!";
                break;
            case '4':
                echo "senha errada";
                echo "!!!!!";
                break;
            default:
                echo "Attention!!! Internal Error !!!";
                break;

          }
       ?>

    </div>
  <p>
    <br><br>
    <input type="submit"   name="Enviar" value="Enviar">
    <input type="submit"   name="create" value="criar conta?">

   </p>
 </body>
</html>
