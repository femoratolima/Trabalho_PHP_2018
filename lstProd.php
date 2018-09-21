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

        <meta charset = "UTF-8">
        <title>Listagem de Produtos</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
        <link rel="stylesheet" href="lstProd.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src="pagefadejs/pagefade-min.js"></script>
    </head>

    <body>
        
        <section class="pagefade" style="display: none">
        <div class = "container col-md-8" >
        <div class="align-middle">     
        
        <h1 class="text-center display-6" >Listagem de Produtos</h1>
        <br>
        <table class="text-center table table-borderless table-hover">
            <tr>
                <thead class="thead-dark">
                    <th>ID</th>
                    <th>Descrição</th>
                    <th>Quantidade</th>
                    <th>Valor</th>
                    <th colspan="2">Operações</th>
                    
                </thead>

                <?php while ($linha = mysql_fetch_array($rs)) {?>
                    <tr>
                        <td>
                            <?php echo utf8_encode($linha ['id']) ?>
                        </td>
                        <td>
                            <?php echo utf8_encode($linha ['descricao']) ?>
                        </td>
                        <td>
                            <?php echo number_format($linha['quantidade'],2,',','.') ?>
                        </td>
                        <td>R$
                            <?php echo number_format($linha['valor'],2,',','.') ?>
                        </td>
                        <td>
                        <button  class="btn btn-outline-warning bt-sm"
                       onclick="javascript: location.href='frmEdtProd.php?id=' +
                      <?php echo $linha['id'] ?>"><i class="fas fa-pen-square"></i></button>
                        </td>
                        <td>
                        <button  class="btn btn-outline-danger bt-sm"
                       onclick="javascript: location.href='frmRemProd.php?id=' +
                      <?php echo $linha['id'] ?>"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                <?php }?>  

            </tr>
        </table>
        
        <input type="button" id="bt_Add" name="bt_Add" class="btn btn-primary" value="Adicionar"
                    onclick="javascripit:location.href='frmInsprod.html'">
        
        <input type="button" id="bt_Bck" name="bt_Bck" class="btn btn-back" value="Voltar"
                    onclick="javascripit:location.href='index.php'">                            
        <br>
        </div> 
        </div>
    </body>
    </section>
</html>
