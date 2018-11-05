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
   $edita = mysql_fetch_array($rs); 
  // echo $edita['descricao'];

?>    

<html>
    <head>
        <meta charset="UTF-8">
        <title>Editar Produto</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
        <link rel="stylesheet" href="frmEdtProd.css">
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
        <section class="pagefade" style="display: none">
        <div class="container col-md-8">
        <h1 class="text-center">Editar Cliente</h1>
        <br>
        <form id="frmEdtCliente" name="frmEdtCliente" method="POST" action="edtCliente.php">
                <div class="form-group">
                    <label for="lbltxtId">ID:  <?php echo $edita['id'] ?> </label>
                    <input type="hidden" id="txtId" name="txtId" value="<?php echo $edita['id'] ?>">
                </div>
                <div class="form-group">
                    <label for="lblNome">Nome: </label>
                    <input type="text" id= "txtNome" name="txtNome" 
                    class="form-control col-md-5" value = "<?php echo $edita['nome']?>">
                </div>
                <div class="form-group">
                    <label for="lblCidade">Cidade: </label>
                    <input type="text" id= "txtCidade" name="txtCidade" 
                    class="form-control col-md-5" value = "<?php echo $edita['cidade']?>">
                </div>
                <div class="form-group">
                    <label for="lblEndereco">Endereço:</label>
                    <input type="text" id= "txtEndereco" name="txtEndereco" 
                    class="form-control col-md-5" value = "<?php echo $edita['endereco']?>">
                </div>  
                <div class="form-group">
                    <label for="lblEmail">Email:</label>
                    <input type="text" id= "txtEmail" name="txtEmail" 
                    class="form-control col-md-5" value = "<?php echo $edita['email']?>">
                </div>  
                <input type="submit" id="bt_Gravar" name="bt_Gravar" class="btn btn-success"  value="Atualizar">
                <input type="reset" id="bt_Limpar" name="bt_Limpar" class="btn btn-primary" value="Limpar">
                <button type="button" id="bt_Cancelar" name="bt_Cancelar" class="btn btn-danger" value="Voltar"
                 onclick="javascript:location.href='lstCliente.php'"><i class="fas fa-arrow-left" ></i> Voltar </button>            
         </form>
        </div>
</section>
    </body>
</html>