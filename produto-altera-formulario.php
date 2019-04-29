<?php include("cabecalho.php"); 
include("conecta.php");
include("banco-categoria.php");
include("banco-produto.php");

$id=$_GET['id'];
$produto = buscaProduto($conexao, $id);
$categorias = listaCategorias($conexao);
$usado = $produto['usado']?"checked='checked'":"";
?>
    <h1>Alterando Produto</h1>
    <form action="altera-produto.php" method="POST">
       <input type="hidden" name="id" value="<?=$produto['id']?>">
        <table class="table">
            <tr>
                <td>Nome:</td>
                <td><input class="form-control" name="nome" type="text" value="<?=$produto['nome']?>"></td>
            </tr>
            <tr>
                <td>Preço:</td>
                <td><input class="form-control" name="preco" type="number" value="<?=$produto['preco']?>"></td>
            </tr>
            <tr>
                <td>Descrição:</td>
                <td><textarea class="form-control" name="descricao"><?=$produto['descricao']?></textarea></td>
            </tr>
            <tr>
                <td>Usado:</td>
                <td><input type="checkbox" name="usado" value="true" <?=$usado?> value="true"></td>
            </tr>
            <tr>
                <td>Categoria:</td>
                <td>
                    <select name="categoria_id" class="form-control" value="<?=$produto['categoria_id']?>">
                    <?php foreach($categorias as $categoria):
                        $essaEhACategoria = $produto['categoria_id'] == $categoria['id'];
                        $selecao = $essaEhACategoria ?"selected='selected'":"";
                    ?>
                       <option value="<?=$categoria['id']?>" <?=$selecao?>>
                           <?=$categoria['nome']?>
                       </option>
                    <?php endforeach ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><button class="btn btn-primary" type="submit">Alterar</button></td>
            </tr>
        </table>
    </form>

<?php include("rodape.php"); ?>