<?php
//=========================================================================================================//
//                              Nome Do Autor: Gustavo Rodolfo stroschon                                   //
//                              Data conclusão do algoritmo: 06/09/19                                      //
//                                                                                                         //
//sitema de login com consulta em arquivo txt , gravacao e sistema de procura com identificacao de erros   //
//como falta de preenchimento do formulario...nome ja repetido no arquivo etc                              //
//=========================================================================================================//
   error_reporting(0);

   $name       = $_POST['name'];
   $passwordV  = $_POST['passwordV'];
   $password   = $_POST['password'];
   $email      = $_POST['email'];

   if ($_POST['login'] == true) {
      header("location: index.php");
      exit();
    }

   if ($name == null) {
     header("location: createacount.php?id=1");
     exit();
   }
   if ($passwordV == null) {
     header("location: createacount.php?id=2");
     exit();
   }
   if ($password == null) {
     header("location: createacount.php?id=3");
     exit();
   }
   if ($email == null) {
     header("location: createacount.php?id=4");
     exit();
   }

   if ($password !== $passwordV) {
    header("location: createacount.php?id=5");
    exit();
   }

   if ($password == '|') {
     header("location: createacount.php?id=7");
     exit();
   }elseif ($name == '|') {
     header("location: createacount.php?id=7");
     exit();
   }

   // arquivo.txt = $iduser."|".$variavel."\n";
   $Idlastuser = verificarId("files/users.txt", 0);
   $Idlastuser = $Idlastuser + 1;

   //$FileUsers = $Idlastuser."|".$name.$Idlastuser."|\n";
   $FileUsers = $Idlastuser."|".$name."|\n";
   $FilePasswords = $Idlastuser."|".$password."|\n";
   $FileEmails = $Idlastuser."|".$email."|\n";

   Verificar("files/users.txt", $name);
   SalvarDados("files/users.txt", $FileUsers);

   SalvarDados("files/passwords.txt", $FilePasswords);

   SalvarDados("files/emails.txt", $FileEmails);

   $Idlastuser = verificarId("files/users.txt", 1);
   $Idlastuser = $Idlastuser + 1;
   echo $Idlastuser;

   function SalvarDados($arg0, $arg1){

     $myfile = fopen($arg0, "a+");
     fwrite($myfile , $arg1);
     fclose($myfile);

   }

   function Verificar($arg2, $arg3){
     $myfile = fopen($arg2, "r");

      if ($myfile) {

             while (($dados = fgets($myfile, filesize($arg2))) !== false) {
                   list($idT, $nameT, $nd) = explode("|", $dados);

                   if($arg3 == $nameT) {
                     echo "Conta ja existe!!!";

                    header("location: createacount.php?id=6");
                    exit();
                  }
              }
         }

         if (feof($myfile) == false) {
             echo "Erro: falha inexperada de fgets()\n";
         }

         fclose($myfile);
     }

   function verificarId($arg4, $arg5){
       $myfile = fopen($arg4, "r");

        if ($myfile) {

               while (($dados = fgets($myfile, filesize($arg4))) !== false) {
                   list($iduserT , $nameT) = explode("|", $dados);
                   if ($arg5 == 1) {
                     echo $iduserT." > ".$nameT."<br>";
                   }

                }
           }
           return $iduserT;

           if (feof($myfile) == false) {
               echo "Erro: falha inexperada de fgets()\n";
           }

           fclose($myfile);
        }

?>
<!DOCTYPE html>
 <html lang="br">
   <head>
     <meta charset="utf-8">
     <title>Conta Criada</title>

       <link href="css/estilo.css" rel="stylesheet">
       <meta name="viewport" content="user-scalable=no, maximum-scale=1">
       <meta name="theme-color" content="#333333"/>
   </head>
   <body>
   </body>
 </html>
