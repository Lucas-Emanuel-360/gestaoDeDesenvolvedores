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
<h1 style='text-align:center;'>Editar</h1><!--TÍTULO-->
    <?php

    require_once '../class/rb-mysql.php';
    $conn = R::setup( 'mysql:host=localhost;dbname=sistema_gestao', 'root'/*, 'aluno'*/);
    if ($conn){echo '';}
    else {echo "<h3 style='color:red;'>Conexão falha!</h3>";}

    require_once '../template/footer2.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $dev = R::load('dev', $id);//CARREGA O PRODUTO DE TAL ID

    if(isset($_GET['newEmail']) && isset($_GET['newSenha'])){//DADOS
        $email = $_GET['newEmail'];
        $senha = $_GET['newSenha'];
        if(isset($_GET['atividade'])){
            $atividade = 'Ativo';
        } else{
            $atividade = 'Inativo';
        }
        if(isset($_GET['adm'])){
            $adm = '✔️';
        } else{
            $adm = '❌';
        }


        $dev->email = $email;
        $dev->senha = $senha;
        $dev->atividade = $atividade;
        $dev->adm = $adm;

        R::exec("UPDATE dev set email='$dev->email', senha='$dev->senha', atividade='$dev->atividade', adm='$dev->adm' WHERE id = $dev->id;");

        if($dev->atividade == 'Ativo'){//MUDAR COR A DEPENDER DA ATIVIDADE
            $style = 'ativo';
        } else if($dev->atividade == 'Inativo'){//MUDAR COR A DEPENDER DA ATIVIDADE
            $style = 'inativo';
        } else {
            echo "<p style='color:red;text-align:center;'>Ocorreu um erro. Por favor <a href='listagem.php' style='color:darkred;'>volte</a> e tente de novo.</p>";
        }

        echo "<h3 style='color:green;text-align:center;'>Alterações salvas com sucesso!</h3>";
        echo "<div style='text-align:center;'><a href='editar.php?id=$dev->id'><i title='Editar' class='fa-solid fa-pen-to-square'></i></a></div><br>";
    }
    else{
        echo "<p style='color:red;'>Por favor, preencha completamente o <a href='editar.php'>formulário</a>.</p>";
    }
?>
<table border='1' cellpadding='10' cellspacing='0' style='text-align:center;margin: 0px auto;'>
    <tr>
        <td>Email</td>
        <td>Senha</td>
        <td>Atividade</td>
        <td>administrador</td>
    </tr>       
    <tr class='<?= $style ?>'>
        <td><?= $dev['email'] ?></td>
        <td><?= $dev['senha'] ?></td>
        <td class='<?= $style ?>'><?= $dev['atividade'] ?></td>
        <td><?= $dev['adm'] ?></td>
    </tr>    
</table>

<?php
}
    R::close();

?>

</body>
</html>