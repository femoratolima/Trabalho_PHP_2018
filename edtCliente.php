<?php


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
    $endereco = trim($_POST['txtEndereco']);
    $cidade = trim($_POST['txtCidade']); 
    $email = trim($_POST['txtEmail']);

    if (!empty($nome) && !empty($endereco) && !empty($cidade) && !empty($email)){
        $sql = "UPDATE cliente SET nome='$nome', endereco='$endereco', cidade='$cidade', email='$email', WHERE id='$id';";
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