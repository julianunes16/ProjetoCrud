<?php
//Importar a conexão com o banco
include("models/conexao.php");
//Cabeçalho da página
include("views/blades/header.php");
?>


<div class="container border rounded mt-5 pt-4 pb-4 ps-4 pe-4 bg-white">
    <a href="views/cadastro.php"><button class="btn btn-success">Cadastrar</button></a>
<hr>
<form action="index.php" method="post">
    <input class="form-control" type="text" name="buscar" placeholder="Digite a busca">
</form>
<hr>
<?php
    if(empty($_POST["buscar"])){
        echo "Nenhum resultado";
    } else {
        $varBuscar = $_POST["buscar"]
?>

<table class="table table-bordered table-striped table-hover">
    
    <tr>
        <td><b>Home</b></td>
        <td><b>Editar</b></td>
        <td><b>Excluir</b></td>
    </tr>

    <?php
        $query = mysqli_query($conexao, "SELECT * FROM alunos WHERE nome LIKE '%$varBuscar%' ORDER BY codigo DESC");
        while($exibe = mysqli_fetch_array($query)){
            $vogal = ($exibe[3]=="m")?"o":"a";
    ?>
    <tr>
        <td><?php echo strtoupper($vogal) . " alun".$vogal ?> se chama <b><?php echo $exibe[1] ?></b> e mora na cidade de <b><?php echo $exibe[2]?></b>.</td>
        <td><button class="btn btn-primary">Editar</button></td>
        <td><a href="controllers/deletarAluno.php?ida=<?php echo $exibe[0]?>"><button class="btn btn-danger">Excluir</button></a></td>
    </tr>
    <?php } ?>
</table>
<?php } ?>
</div>
<?php
/*Condicional
include("controllers/cond-num.php");
*/

//Rodapé da página
include("views/blades/footer.php");
?>