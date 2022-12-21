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

<h1 style='text-align:center;'>Editar</h1><!--TÍTULO-->
    <?php


if(isset($_GET['id'])){
    $id = $_GET['id'];
    $dev = R::load('dev', $id);//CARREGA O DEV DE TAL ID

    if(isset($_GET['newEmail']) && isset($_GET['newSenha']) && isset($_GET['newNome']) && isset($_GET['newNascimento']) && isset($_GET['newNivel'])){//DADOS
        $email = $_GET['newEmail'];
        $senha = $_GET['newSenha'];
        $nome = $_GET['newNome'];
        $nascimento = $_GET['newNascimento'];

        if($_GET['newNivel'] == 'junior'){
            $nivel = 'Junior';
        } else if($_GET['newNivel'] == 'pleno'){
            $nivel = 'Pleno';
        } else if($_GET['newNivel'] == 'senior'){
            $nivel = 'Sênior';
        }

        if(isset($_GET['newAtividade'])){
            $atividade = 'Ativo';
        } else{
            $atividade = 'Inativo';
        }

        if(isset($_GET['newAdm'])){
            $adm = '✔️';
        } else{
            $adm = '❌';
        }


        $dev->email = $email;
        $dev->senha = $senha;
        $dev->atividade = $atividade;
        $dev->adm = $adm;
        $dev->nome = $nome;
        $dev->nascimento = $nascimento;
        $dev->nivel = $nivel;

        R::exec("UPDATE dev set email='$dev->email', senha='$dev->senha', atividade='$dev->atividade', adm='$dev->adm', nome='$dev->nome', nascimento='$dev->nascimento', nivel='$dev->nivel' WHERE id = $dev->id;");

        if($dev->atividade == 'Ativo'){//MUDAR COR A DEPENDER DA ATIVIDADE
            $style = 'ativo';
        } else if($dev->atividade == 'Inativo'){//MUDAR COR A DEPENDER DA ATIVIDADE
            $style = 'inativo';
        } else {
            echo "<p style='color:red;text-align:center;'>Ocorreu um erro. Por favor <a href='listagem.php' style='color:darkred;'>volte</a> e tente de novo.</p>";
        }

        echo "<h3 style='color:green;text-align:center;'>Alterações salvas com sucesso!</h3>";
    }
?>
<table border='1' cellpadding='10' cellspacing='0' style='text-align:center;margin: 0px auto;'>
    <tr>
        <td>Email</td>
        <td>Senha</td>
        <td>Atividade</td>
        <td>administrador</td>
        <td>Nome</td>
        <td>Nascimento</td>
        <td>Nível</td>
        <td>Editar</td>
    </tr>       
    <tr class='<?= $style ?>'>
        <td><?= $dev['email'] ?></td>
        <td><?= $dev['senha'] ?></td>
        <td class='<?= $style ?>'><?= $dev['atividade'] ?></td>
        <td><?= $dev['adm'] ?></td>
        <td><?= $dev['nome'] ?></td>
        <td><?= $dev['nascimento'] ?></td>
        <td><?= $dev['nivel'] ?></td>
        <td><a href='extra-dev/editar.php?id=<?= $dev['id'] ?>'><i title='Editar' class='fa-solid fa-pen-to-square'></i></a></td>
    </tr>    
</table>

<?php
}
    else{
        echo "<p style='color:red;text-align:center;'>Ocorreu um erro, <a href='../index.php'>volte</a> e tente novamente.</p>";
    }
require_once '../template/menu2.php';
    R::close();

?>

</body>
</html>