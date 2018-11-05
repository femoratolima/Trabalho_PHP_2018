<?php

   $conexao = mysql_connect("localhost", "root", "");
   if(!$conexao){
       echo "Erro ao se conectar ao MySql <br/>";
       exit;
   }

   $banco = mysql_select_db("trabalho");
   if(!$banco){
       echo "Erro ao se conectar ao banco produtos.";
       exit;
   }

   $user = trim($_POST['user']);
   $pwd = trim($_POST['pwd']);
   $pwd = md5($pwd);

   $rs = mysql_query("SELECT * FROM usuario where user like '$user'");
   $linha = mysql_fetch_array($rs); 
   //echo ($linha['user'] . " - " . $linha['pwd']);

   if($pwd==$linha['pwd']){
        session_start();

        $_SESSION['user'] = $user;
        header('location: index.php');
   }
   else{
    echo"<script language='javascript' type='text/javascript'>alert('Usuário ou senha incorretos!');window.location.href='login.html'</script>";
        
   }

?> 