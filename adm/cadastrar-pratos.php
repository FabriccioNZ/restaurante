<?php
include('../includes/conexao.php');


    $imagem = $_FILES['imagem'];
    $nprato = $_POST['nome'];
    $codigo = $_POST['codigo'];
    $categoria = $_POST['categoria'];
    $preco = $_POST['preco'];
    $descricao = $_POST['descricao'];
    $caloria = $_POST['calorias'];
    $destaque = $_POST['destaque'];

    
    $dir = "../img/cardapio/"; 

    $imagem["name"] = $codigo.".jpg";


    if (move_uploaded_file($imagem["tmp_name"], "$dir".$imagem["name"])) { 

       echo "Arquivo enviado com sucesso!"; 
    } 
    else { 
        echo "Erro, o arquivo não pode ser enviado."; 
    }   

    $sql = "INSERT INTO tb_pratos (codigo, nome, categoria, descricao,  preco, caloria, destaque) 
    VALUES ('$codigo', '$nprato', '$categoria', '$descricao', '$preco', '$caloria', '$destaque')";



    if($conexao->query($sql)){
        echo "Salvo com sucesso";
    }else{
        echo "Erro ao salvar";
    }
    
    $conexao->close();

?>