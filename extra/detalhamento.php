<!-- PRECISA MODIFICAR AQUI AINDA -->


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

<?php
    require_once '../template/footer2.php';
    require_once '../class/rb-mysql.php';
    $conn = R::setup( 'mysql:host=localhost;dbname=sistema_gestao', 'root');
    if ($conn){echo '';}
    else {echo "<h3 style='color:red;'>Conexão falha!</h3>";}

    if (isset($_GET['id'])) {//ID
        $dev = R::load('dev', $_GET['id']);//CARREGA O PRODUTO DE TAL ID
        if($dev->atividade == 'Ativo'){//MUDAR COR A DEPENDER DA ATIVIDADE
            $style = 'ativo';
        } else if($dev->atividade == 'Inativo'){//MUDAR COR A DEPENDER DA ATIVIDADE
            $style = 'inativo';
        } else {
            echo "<p style='color:red;text-align:center;'>Ocorreu um erro. Por favor <a href='listagem.php' style='color:darkred;'>volte</a> e tente de novo.</p>";
        }
?>
<h1 style='text-align:center;'>Detalhes - <?= $dev['nome'] ?></h1><!--TÍTULO-->
<div style='text-align:center;'><a href='editar.php?id=<?=$dev->id?>'><i title='Editar' class='fa-solid fa-pen-to-square'></i></a></div><br>

<table border='1' cellpadding='10' cellspacing='0' style='text-align:center;margin: 0px auto;'>
    <tr>
        <td>Nome</td>
        <td>Descrição</td>
        <td>Preço (R$)</td>
        <td>Estoque</td>
    </tr>       
    <tr class='<?= $style ?>'>
        <td><?= $dev['nome'] ?></td>
        <td><?= $dev['descricao'] ?></td>
        <td><?= number_format((float)$dev['preco'], 2, ',', '.') ?></td>
        <td class='<?= $style ?>'><?= $dev['estoque'] ?></td>
    </tr>   
</table>

<?php

    }
    else{
        echo "<p style='color:red;text-align:center;'>Ocorreu um erro. Por favor <a href='../listagem.php' style='color:darkred;'>volte</a> e tente de novo.</p>";
    }

    R::close();
?>

    
</body>
</html>