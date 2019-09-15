<?php
//=========================================================================================================//
//                              Nome Do Autor: Gustavo Rodolfo stroschon                                   //
//                              Data conclusão do algoritmo: 06/09/19                                      //
//                                                                                                         //
//sitema de login com consulta em arquivo txt , gravacao e sistema de procura com identificacao de erros   //
//como falta de preenchimento do formulario...nome ja repetido no arquivo etc                              //
//=========================================================================================================//
error_reporting(0);


$user       = $_POST['name'];
$password   = $_POST['password'];


if ($_POST['create'] == true) {
  header("location: createacount.php");
  exit();
}

if ($user == null) {
  header("location: index.php?id=1");
  exit();
}
if ($password == null) {
  header("location: index.php?id=2");
  exit();
}
$linhaValidacao = 0;

echo "Verificaçao de nomes...<br>";
VerificarName("files/users.txt", $user);
echo "verificacao de senhas...<br>";
VerificarSenha("files/passwords.txt", $password);


function VerificarName($arg3, $arg4){

  $myfile = fopen($arg3, "r");

  if ($myfile) {

      $i = 0;
      global $linhaValidacao;
      $linhaValidacao = 0;

      while (($dados = fgets($myfile, filesize($arg3))) !== false) {
          $linhaValidacao++;

          list($idT, $nameT, $nd) = explode("|", $dados);

          if (strcasecmp($arg4, $nameT) == 0) {  // comparacao de strings sem case sensitive
            echo "<br>UserName encontrado na linha : ".$linhaValidacao;
            $i++;
            break;//sai do laço while poisco nome ja foi encontrado
          }
       }

      if ($i == 0) {
        //erro usuario nao encontrado
        header("location: index.php?id=3");
        exit();
      }
    }
      if (feof($myfile) == false and $i == 0) {
          echo "Erro: falha inexperada de fgets() (nao chegou ao final do aquivo)\n";
      }else {
          echo "<br>Arquivo de nomes verificado por completo.<br><br><br>\n";
      }
      fclose($myfile);
}
function VerificarSenha($arg1, $arg2){

  $myfile = fopen($arg1, "r");

  if ($myfile) {

      $i = 0;
      $linhas = 0;
      global $linhaValidacao;

      while (($dados = fgets($myfile, filesize($arg1))) !== false) {

          $linhas++;
          list($idT, $passwordT, $nd) = explode("|", $dados);

          if ($linhaValidacao == $linhas) {
            if (strcasecmp($arg2, $passwordT) == 0) {  // comparacao de strings sem case sensitive
               $i++;
               break;
             }
          }

        }

          echo "<br> voce digitou :".$arg2."<br>A senha certa : ".$passwordT;
          echo "<br><br><br>informacoes gerais:";
          echo "<br><br> linhas do arquivo :".$linhas;
          echo "<br>verificar na linha:".$linhaValidacao;
          echo "<br>linhas de referencia do laço while:".$linhas;

      if ($i == 0){
            echo "<br>Senha errada!!!!<br>";
            //erro usuario nao encontrado
            header("location: index.php?id=4");
            exit();
       }else {
            echo "<br> Conta acessada.<br>";
       }
     }

      if (feof($myfile) == false and $i == 0) {
          echo "Erro: falha inexperada de fgets()\n";
      }else {
          echo "<br><br>Arquivo de senhas verificado por completo.(ate aonde foi nessesario)\n";
      }

      fclose($myfile);

}

?>
<!DOCTYPE html>
<html lang="br">
  <head>
    <meta charset="utf-8">
    <title>Conta Acessada</title>

      <link href="css/estilo.css" rel="stylesheet">
      <meta name="viewport" content="user-scalable=no, maximum-scale=1">
      <meta name="theme-color" content="#333333"/>
  </head>
  <body>
  </body>
 </html>
