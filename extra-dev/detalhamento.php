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
        $dev = R::load('dev', $_GET['id']);//CARREGA O DEV DE TAL ID
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
        <td>Email</td>
        <td>Senha</td>
        <td>Atividade</td>
        <td>administrador</td>
        <td>Nome</td>
        <td>Nascimento</td>
        <td>Nível</td>
    </tr>       
    <tr class='<?= $style ?>'>
        <td><?= $dev['email'] ?></td>
        <td><?= $dev['senha'] ?></td>
        <td class='<?= $style ?>'><?= $dev['atividade'] ?></td>
        <td><?= $dev['adm'] ?></td>
        <td><?= $dev['nome'] ?></td>
        <td><?= $dev['nascimento'] ?></td>
        <td><?= $dev['nivel'] ?></td>
    </tr>   
</table>
<?php

    }
    else{
        echo "<p style='color:red;text-align:center;'>Ocorreu um erro. Por favor <a href='../listagem.php' style='color:darkred;'>volte</a> e tente de novo.</p>";
    }

    require_once '../template/menu2.php';
    R::close();
?>

    
</body>
</html>