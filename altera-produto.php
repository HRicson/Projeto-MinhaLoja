<?php 
include("cabecalho.php");
include("conecta.php");
include("banco-produto.php");

$id = $_POST['id'];
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
if(alteraProduto($conexao, $id, $nome, $preco, $descricao, $categoria_id, $usado)){
    echo "<p class='text-success'>O produto $nome, valor R$ $preco foi alterado.</p>";
}else{
    $msg = mysqli_error($conexao);
    echo "<p class='text-danger'>O produto $nome não foi alterado: <br>$msg</p>";
}

include("rodape.php");
?>