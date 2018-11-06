<?php

    session_start();
    if(!isset($_SESSION['user']))
        header("location: ./login.html");

    $conexao = mysql_connect("localhost","root",""); 
	if (!$conexao){
		echo "Erro ao se conectar MySql <br/>" ; 
		exit;
    }
    $banco  = mysql_select_db("trabalho");
	if (!$banco){
		echo "Erro ao se conectar ao banco estoque...";
		exit;
    }

    $id = trim($_POST['txtId']); 
    $nome = trim($_POST['txtNome']); 
    $cidade = trim($_POST['txtCidade']);
    $endereco = trim($_POST['txtEndereco']); 
    $email = trim($_POST['txtEmail']); 

    if (!empty($nome) && !empty($cidade) && !empty($endereco) && !empty($email)){
        $sql = "UPDATE cliente SET nome='$nome',cidade='$cidade', endereco='$endereco', email='$email' WHERE id='$id';";
        $ins = mysql_query($sql); 
        if (!$ins){
            echo "Erro ao atualizar produto...";
          
        }
    }
    else {
		echo "campos em branco...";
	
    }
    
    header('location: lstCliente.php');
?>