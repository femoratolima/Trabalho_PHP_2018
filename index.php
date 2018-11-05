<?php

    session_start();
    if(!isset($_SESSION['user']))
        header("location: ./login.html");

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

   $rs = mysql_query("SELECT * FROM produto;");

?>

<html>
	<head>
		<meta charset="utf-8">
		<title>Trabalho PHP 2018</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
        <link href="index.css" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src="pagefadejs/pagefade-min.js"></script>
    </head>
	<body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">Trabalho PHP</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link" href="lstProd.php">Produtos</a>
                    <a class="nav-item nav-link" href="lstCliente.php">Clientes</a>
                    <a class="nav-item nav-link" href="lstVenda.php">Vendas</a>
                </div>
            </div>
            <form class="form-inline my-2 my-lg-0">
                <input type="button" id="logOut" name="logOut"class="btn btn-outline-success btn-sm" onclick="javascript:location.href='logout.php'" value="Deslogar"></input>
            </form>
        </nav>
        
        
    </body>    
</html>

