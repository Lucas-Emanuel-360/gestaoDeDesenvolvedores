<?php
    require_once 'class/rb-mysql.php';
$conn = R::setup( 'mysql:host=localhost;dbname=sistema_gestao', 'root', 'aluno');
   
    R::close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=projice-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' href="css/style.css">
    <script src="https://kit.fontawesome.com/cc9f72a45c.js" crossorigin="anonymous"></script>
    <title>Gestão de desenvolvedores e respectivas tarefas em projetos</title>
</head>
<body>
<header><p style="text-align: center;opacity:75%;font-size:10pt;">&copy; Clara Ribeiro e Lucas Emanuel ~ 2022</p><h1 style='text-align:center;'>Listagem</h1></header>

<table border='1' cellpadding='10' cellspacing='0' style='text-align:center;margin: 0px auto;'><!--TABELA-->
    <thead style='background-color:grey;color:white;'>
        <tr>
            <td>NOME</td>
            <td>INÍCIO</td>
            <td>TÉRMINO PLANEJADO</td>
            <td>TÉRMINO</td>
            <td colspan=3>EXTRA</td><!--DETALHE, EXCLUSÃO E EDITAR-->
        </tr>
    </thead>
    <tbody>
<?php
   

    if(R::find('proj')){echo "<p style='font-size:20pt;text-align:center;'><a href='extra-proj/excluirTodos.php'><i title='Excluir todos permanentemente' style='color:darkred;' class='fa-solid fa-trash-can'></i></a></p>";}
    else{echo "<h3>Nenhum projeto adicionado.</h3>";}

    foreach (R::findAll('proj') as $proj) {//ITERAÇÃO
?>
    <tr>
        <td><?= $proj['nome'] ?></td>
        <td><?= $proj['inicio'] ?></td>
        <td><?= $proj['terminoPlanejado'] ?></td>
        <td><?= $proj['termino'] ?></td>
        <td><a href='extra-proj/detalhamento.php?id=<?= $proj['id'] ?>'><i title='Ver detalhes' class="fa-solid fa-magnifying-glass"></i></a></td>
        <td><a href='extra-proj/editar.php?id=<?= $proj['id'] ?>'><i title='Editar' class="fa-solid fa-pen-to-square"></i></a></td>
        <td><a href='extra-proj/excluir.php?id=<?= $proj['id'] ?>'><i title='Excluir permanentemente' style='color:darkred;' class="fa-solid fa-trash-can"></i></a></td>
    </tr>
<?php
    }
    echo "<div style='text-align:center;'><a href='projeto.php'><i title='Novo projeto' class='fa-solid fa-plus'></i></a></div><br>";

?>
    </tbody>
</table>
<?php
        require_once 'template/menu.php';
        R::close();

?>
</body>
</html>