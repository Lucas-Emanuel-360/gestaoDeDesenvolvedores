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
    <header><p style="text-align: center;opacity:75%;font-size:10pt;">&copy; Clara Ribeiro e Lucas Emanuel ~ 2022</p></header>

<?php

    if (isset($_GET['id'])) {//ID
        $proj = R::load('proj', $_GET['id']);//CARREGA O PROJ DE TAL ID
        
?>
<h1 style='text-align:center;'>Detalhes - <?= $proj['nome'] ?></h1><!--TÍTULO-->
<div style='text-align:center;'><a href='editar.php?id=<?=$proj->id?>'><i title='Editar' class='fa-solid fa-pen-to-square'></i></a></div><br>

<table border='1' cellpadding='10' cellspacing='0' style='text-align:center;margin: 0px auto;'>
    <tr>
        <td>Nome</td>
        <td>Início</td>
        <td>Término Planejado</td>
        <td>Término</td>
    </tr>       
    <tr>
        <td><?= $proj['nome'] ?></td>
        <td><?= $proj['inicio'] ?></td>
        <td><?= $proj['terminoPlanejado'] ?></td>
        <td><?= $proj['termino'] ?></td>
    </tr>   
</table>
<?php

    }
    else{
        echo "<p style='color:red;text-align:center;'>Ocorreu um erro. Por favor <a href='../listagem-proj.php' style='color:darkred;'>volte</a> e tente de novo.</p>";
    }

    require_once '../template/menu2.php';
    R::close();
?>

    
</body>
</html>