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

    if (!empty($id)){
        $sql = "DELETE FROM cliente WHERE id='$id';";
        $ins = mysql_query($sql); 
        if (!$ins){
            echo "Erro ao REMOVER cleinte...";
          
        }
    }
    else {
		echo "campos em branco...";
	
    }
    
    header('location: lstCliente.php');
?>