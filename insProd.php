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

   $desc = trim($_POST['txtDesc']);
   $qtde = trim($_POST['txtQtd']);
   $val = trim($_POST['txtVal']);

   if(!empty($desc) && $val>0){
        $sql = "INSERT INTO produto (descricao, quantidade, valor) VALUES ('$desc', '$qtde', '$val')";
        $ins = mysql_query($sql);
        if(!$ins){
            echo ("Erro na consulta de inserir produtos");
        }else{
            header("location: lstProd.php");
        }
   }
   else echo "Descrição em branco ou valor do campo é igual a zero";

   

?>    