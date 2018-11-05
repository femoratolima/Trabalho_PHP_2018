<?php 
    $nome = $_POST['nome'];
    $twitter  =$_POST['twitter'];
    $email = $_POST['email'];
    $num = $_POST['numero'];
    $pas = $_POST['pas'];
    $sexo = $_POST['sexo'];
    $check = $_POST['check'];
   

    echo "Nome: " .$nome . "</br>";
    echo "Twitter: " .$twitter . "</br>";
    echo "Email: " .$email . "</br>";
    echo "Número: " .$num . "</br>";
    echo "Senha: " .$pas . "</br>";
    if($sexo == 0)
        echo "Sexo: Masculino" . "</br>";
    else echo "Sexo: Feminino" . "</br>";
    echo "Checagem: ".$check ."</br>";


?>