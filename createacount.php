<!DOCTYPE html>
<html lang="br">
  <head>
      <meta charset="utf-8">
       <title>criar</title>

       <link href="css/estilo.css" rel="stylesheet">
       <meta name="viewport" content="initial-scale=0.4">
       <meta name="theme-color" content="#333333"/>
       <meta name="description" content="test" />
       <meta name="keywords" content="testdnv"/>
       <meta name="robots" content="index, follow">
  </head>
  <body>
   <form action="acesscreate.php" method="post" />
     <p>
       defina um nome de usuario:<br>
       <input type="text" name="name" placeholder="Digite um nome de usuario" autocomplete="on">
     </p>

     <p>
       Defina uma senha:<br>
       <input type="password" name="password" placeholder="Digite uma senha" autocomplete="off">
     </p>

     <p>
       Digite novamente a senha:<br>
       <input type="password" name="passwordV" placeholder="Digite sua senha novamente" autocomplete="off">
     </p>

     <p>
       E-mail:<br>
       <input type="email" name="email" placeholder="Digite o seu email" autocomplete="on">
     </p>
       <div id="error">
    <?php

        error_reporting(0);
        $id   = $_GET['id'];

        if ($id == null) {
          $id = 0;
        }
        switch ($id) {
            case '0':
                echo "";
                break;
            case '1':
                echo "Nome Não Definido !!!!!";
                break;
            case '2':
                echo "Digite novamente sua senha !!!!!";
                break;
            case '3':
                echo "Senha Não Definida !!!!!";
                break;
            case '4':
                echo "Email Não Definido !!!!!";
                break;
            case '5':
                echo "Senhas diferentes !!!!!";
                break;
            case '6':
                echo "este usuario ja existe !!!!!";
                break;
            case '7':
                echo "caractere invalido !!!!!";
                break;
            default:
                echo "erro no sistema(id de erro invalido) !!!!!";
                break;

          }
    ?>
       </div>
     <p>
       <br><br>
       <input type="submit"   name="Enviar" value="Enviar">
       <input type="submit"   name="login" value="ja tem uma conta?">

      </p>
 </body>
</html>
