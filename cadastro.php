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

    $query_select = "SELECT * FROM usuario WHERE user = '$user'";
    $select = mysql_query($query_select);
    $array = mysql_fetch_array($select);
    $logarray = $array['user'];

    if($user == "" || $user == null){
        echo"<script language='javascript' type='text/javascript'>alert('O campo usuário deve ser preenchido');window.location.href='cadastro.html';</script>";
     
        }else{
          if($logarray == $user){
     
            echo"<script language='javascript' type='text/javascript'>alert('Esse usuário já existe');window.location.href='cadastro.html';</script>";
            die();
     
          }else{
            $query = "INSERT INTO usuario (user,pwd) VALUES ('$user','$pwd')";
            $insert = mysql_query($query);
             
            if($insert){
              echo"<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');window.location.href='login.html'</script>";
            }else{
              echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário');window.location.href='cadastro.html'</script>";
            }
          }
        }

    

?>