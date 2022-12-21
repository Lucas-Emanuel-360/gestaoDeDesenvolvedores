<?php
require_once 'class/rb-mysql.php';
$conn = R::setup('mysql:host=localhost;dbname=sistema_gestao', 'root', 'aluno');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' href="css/style.css">
    <script src="https://kit.fontawesome.com/cc9f72a45c.js" crossorigin="anonymous"></script>
    <title>Gestão de desenvolvedores e respectivas tarefas em projetos</title>
</head>

<body>
    <header>
        <p style="text-align: center;opacity:75%;font-size:10pt;">&copy; Clara Ribeiro e Lucas Emanuel ~ 2022</p>
    </header>

    <?php


    if (isset($_GET['nome']) && isset($_GET['nascimento']) && isset($_GET['nivel'])) {
        $dev = R::dispense('dev'); //ARMAZENAR NA TABLE
        $nome = $_GET['nome'];
        $nascimento = $_GET['nascimento'];

        if ($_GET['nivel'] == 'junior') {
            $nivel = 'Junior';
        } else if ($_GET['nivel'] == 'pleno') {
            $nivel = 'Pleno';
        } else if ($_GET['nivel'] == 'senior') {
            $nivel = 'Sênior';
        }
        $dev->nome = $nome;
        $dev->nascimento = $nascimento;
        $dev->nivel = $nivel;
        $idDev = R::store($dev);
    }



    //DETERMINAR ID

    if (isset($_GET['email']) && isset($_GET['senha'])) {
        $cred = R::dispense('cred'); //DADOS
        $email = $_GET['email'];
        $senha = $_GET['senha'];

        if (isset($_GET['atividade'])) {
            $atividade = 'Ativo';
        } else {
            $atividade = 'Inativo';
        }

        if (isset($_GET['adm'])) {
            $adm = '✔️';
        } else {
            $adm = '❌';
        }
        $cred->email = $email;
        $cred->senha = $senha;
        $cred->atividade = $atividade;
        $cred->adm = $adm;
        $cred->dev = $dev;
        $idCredential = R::store($cred);



        if ($cred->atividade == 'Ativo') { //MUDAR COR A DEPENDER DA ATIVIDADE
            $style = 'ativo';
        } else if ($cred->atividade == 'Inativo') { //MUDAR COR A DEPENDER DA ATIVIDADE
            $style = 'inativo';
        } else {
            echo "<p style='color:red;text-align:center;'>Ocorreu um erro. Por favor <a href='listagem.php' style='color:darkred;'>volte</a> e tente de novo.</p>";
        }


        echo "<header><h3 style='color:green;'>Desenvolvedor cadastrado com sucesso!</h3></header>";
        echo "<table style='margin: auto;'><td><ul class='fa-ul'><li><span class='fa-li'><a href='index.php'><i class='fa-solid fa-rotate-left'></i></span>Voltar para o início</a></li></ul></td></table>";
        echo "<table style='margin: auto;'><td><ul class='fa-ul'><li><span class='fa-li'><a href='credenciamento.php'><i class='fa-solid fa-pen'></i></span>Novo credenciamento</a></li></ul></td></table>";

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
                <td><?= $cred['email'] ?></td>
                <td><?= $cred['senha'] ?></td>
                <td class='<?= $style ?>'><?= $cred['atividade'] ?></td>
                <td><?= $cred['adm'] ?></td>
                <td><?= $dev['nome'] ?></td>
                <td><?= $dev['nascimento'] ?></td>
                <td><?= $dev['nivel'] ?></td>
                <td><a href='extra-dev/editar.php?id=<?= $dev['id'] ?>'><i title='Editar' class='fa-solid fa-pen-to-square'></i></a></td>
            </tr>
        </table>

    <?php
    } else {
    ?>
        <header>
            <h1 style='text-align:center;'>Dados do desenvolvedor</h1>
        </header>
        <!--TÍTULO-->
        <form action='credenciamento.php' method='get'>
            <!--FORMULÁRIO-->
            <table cellpadding='10' cellspacing='0' style='margin: 0px auto;'>
                <!--TABELA-->
                <tr>
                    <td><label for='email'>EMAIL:</label></td>
                    <td><input type='email' name='email' id='email' placeholder='Máximo de 250 caracteres' maxlength='250' required></td>
                    <!--EMAIL-->
                </tr>
                <tr>
                    <td><label for='senha'>SENHA:</label></td>
                    <td><input type='password' name='senha' id='senha' placeholder='Máximo de 64 caracteres' maxlength='64' required></td>
                    <!--SENHA-->
                </tr>
                <tr>
                    <td><label for='atividade'>ATIVO:</label></td>
                    <td><input type='checkbox' name='atividade' id='atividade' value='true' checked></td>
                    <!--ATIVIDADE-->
                </tr>
                <tr>
                    <td><label for='adm'>ADMINISTRADOR:</label></td>
                    <td><input type='checkbox' name='adm' id='adm' value='true' checked></td>
                    <!--ADMINISTRADOR-->
                </tr>
                <tr>
                    <td><label for='nome'>NOME:</label></td>
                    <td><input type='text' name='nome' id='nome' required placeholder='Máximo de 45 caracteres' maxlength='45'></td>
                    <!--NOME-->
                </tr>
                <tr>
                    <td><label for='nascimento'>NASCIMENTO:</label></td>
                    <td><input type='date' name='nascimento' id='nascimento' required></td>
                    <!--NOME-->
                </tr>
                <tr>
                    <td><label for='nivel'>NÍVEL:</label></td>
                    <td><select name="nivel" id="nivel" style='font-size:larger;'>
                            <option value="junior">Junior</option>
                            <option value="pleno">Pleno</option>
                            <option value="senior">Sênior</option>
                        </select></td>
                </tr>
                <tr>
                    <td colspan='2' style='text-align:right;'><button style='font-size: 18pt;'>Enviar</button></td>
                    <!--ENVIAR-->
                </tr>
            </table>
        </form>
    <?php
    }

    require_once 'template/menu.php';
    R::close();
    ?>
</body>

</html>