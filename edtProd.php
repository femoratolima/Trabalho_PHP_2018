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
    $desc = trim($_POST['txtDesc']); 
    $qtd = trim($_POST['txtQtd']);
    $val = trim($_POST['txtVal']); 

    if (!empty($desc) && !empty($val)){
        $sql = "UPDATE produto SET descricao='$desc', quantidade='$qtd', valor='$val' WHERE id='$id';";
        $ins = mysql_query($sql); 
        if (!$ins){
            echo "Erro ao atualizar produto...";
          
        }
    }
    else {
		echo "campos em branco...";
	
    }
    
    header('location: lstProd.php');
?>