<?php 
include("cabecalho.php");
include("conecta.php");
include("banco-produto.php");

$nome = $_POST['nome'];
$preco = $_POST['preco'];
$descricao = $_POST['descricao'];
$categoria_id = $_POST['categoria_id'];
if(array_key_exists('usado',$_POST)){
    $usado = "true";
}else{
    $usado = "false";
}

echo "<h1>Cadastro</h1>";
if(insereProduto($conexao, $nome, $preco, $descricao, $categoria_id, $usado)){
    echo "<p class='text-success'>O produto $nome, valor R$ $preco foi adicionado.</p>";
}else{
    $msg = mysqli_error($conexao);
    echo "<p class='text-danger'>O produto $nome não foi adicionado: <br>$msg</p>";
}

include("rodape.php");
?>