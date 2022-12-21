<?php
require_once '../class/rb-mysql.php';
$conn = R::setup( 'mysql:host=localhost;dbname=sistema_gestao', 'root', 'aluno');

R::close();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' href="../css/style.css">
    <script src="https://kit.fontawesome.com/cc9f72a45c.js" crossorigin="anonymous"></script>
    <title>Gestão de desenvolvedores e respectivas tarefas em projetos</title>
</head>

<body>
    <header>
        <p style="text-align: center;opacity:75%;font-size:10pt;">&copy; Clara Ribeiro e Lucas Emanuel ~ 2022</p>
    </header>

    <h1 style='text-align:center;'>Editar</h1>
    <!--TÍTULO-->
    <?php


    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $proj = R::load('proj', $id); //CARREGA O PROJ DE TAL ID

        if (isset($_GET['newNome']) && isset($_GET['newInicio']) && isset($_GET['newTerminoPlanejado']) && isset($_GET['newTermino'])) { //DADOS
            $nome = $_GET['newNome'];
            $inicio = $_GET['newInicio'];
            $terminoPlanejado = $_GET['newTerminoPlanejado'];
            $termino = $_GET['newTermino'];

            $proj->nome = $nome;
            $proj->inicio = $inicio;
            $proj->terminoPlanejado = $terminoPlanejado;
            $proj->termino = $termino;


            R::exec("UPDATE proj set nome='$proj->nome', inicio='$proj->inicio', termino_planejado='$proj->terminoPlanejado', termino='$proj->termino' WHERE id=$proj->id;");
            echo "<h3 style='color:green;text-align:center;'>Alterações salvas com sucesso!</h3>";
        }
    ?>
        <table border='1' cellpadding='10' cellspacing='0' style='text-align:center;margin: 0px auto;'>
            <tr>
                <td>Nome</td>
                <td>Início</td>
                <td>Término Planejado</td>
                <td>Término</td>
                <td>Editar</td>
            </tr>
            <tr>
                <td><?= $proj['nome'] ?></td>
                <td><?= $proj['inicio'] ?></td>
                <td><?= $proj['terminoPlanejado'] ?></td>
                <td><?= $proj['termino'] ?></td>
                <td><a href='extra-proj/editar.php?id=<?= $proj['id'] ?>'><i title='Editar' class='fa-solid fa-pen-to-square'></i></a></td>
            </tr>
        </table>

    <?php
    } else {
        echo "<p style='color:red;text-align:center;'>Ocorreu um erro, <a href='../index.php'>volte</a> e tente novamente.</p>";
    }
    require_once '../template/menu2.php';
    R::close();

    ?>

</body>

</html>