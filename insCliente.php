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

   $nome = trim($_POST['txtNome']);
   $cidade = trim($_POST['txtCidade']);
   $endereco = trim($_POST['txtEndereco']);
   $email = trim($_POST['txtEmail']);
   $saldo = trim($_POST['txtSaldo']);

   if(!empty($nome) && $saldo>0 && !empty($cidade) && !empty($email)){
        $sql = "INSERT INTO cliente (nome, cidade, endereco, email, saldo) VALUES ('$nome', '$cidade', '$endereco', '$email', '$saldo')";
        $ins = mysql_query($sql);
        if(!$ins){
            echo ("Erro na consulta de inserir clientes");
        }else{
            header("location: lstCliente.php");
        }
   }
   else echo "Descrição em branco ou valor do campo é igual a zero";

   

?>    