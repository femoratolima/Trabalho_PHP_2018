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

   $id = trim($_REQUEST['id']); //codigo do produto que vai editar
   $rs = mysql_query("SELECT * FROM  cliente where id=".$id);
   $linha = mysql_fetch_array($rs); 
  // echo $edita['descricao'];

?>    

<html>
    <head>
        <meta charset="UTF-8">
        <title>Remover Cliente</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link rel="stylesheet" href="frmRemProd.css">
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
        <section class="pagefade" style="display: none">
        <div class="container col-md-8">
            <h1 class="text-center">Remover Cliente</h1>
            <form id="frmRemCliente" name="frmRemCliente" method="POST" action="remCliente.php">
                <div class="form-group">
                    <label for="lblId">
                        <span class="font-weight-bold">ID: </span>
                        <span class="font-weight-normal"><?php echo $linha['id']; ?></span>
                    </label>
                    <input type="hidden" id="txtId" name="txtId" value="<?php echo $linha['id']; ?>">
                </div>
                <div class="form-group">
                    <label for="lblNome">
                        <span class="font-weight-bold">Nome: </span>
                        <span class="font-weight-normal"><?php echo $linha['nome']; ?></span>
                    </label>
                </div>
                <div class="form-group">
                    <label for="lblEndereco">
                        <span class="font-weight-bold">Endereço: </span>
                        <span class="font-weight-normal"><?php echo $linha['endereco']; ?></span>
                    </label>
                </div>
                <div class="form-group">
                    <label for="lblCidade">
                        <span class="font-weight-bold">Cidade: </span>
                        <span class="font-weight-normal"><?php echo $linha['cidade']; ?></span>
                    </label>
                </div>
                <div class="form-group">
                    <label for="lblEmail">
                        <span class="font-weight-bold">Email: </span>
                        <span class="font-weight-normal"><?php echo $linha['email']; ?></span>
                    </label>
                </div>
                <div class="form-group">
                    <label for="lblSaldo">
                        <span class="font-weight-bold">Saldo: </span>
                        <span class="font-weight-normal">R$: <?php echo $linha['saldo']; ?></span>
                    </label>
                </div>
                <button name="btRem" id="btRem" class="btn btn-success" type="submit"><i class="fas fa-trash"></i> Remover</button>
                <button name="btBck" id="btBck" class="btn btn-danger" type="button" onclick="javascript:location.href='lstCliente.php'"><i class="fas fa-arrow-left" ></i> Voltar</button>
            </form>
        </div>
</section>
    </body>
</html>
