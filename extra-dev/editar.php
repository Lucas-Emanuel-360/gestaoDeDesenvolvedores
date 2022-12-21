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

<h1 style='text-align:center;'><i class="fa-solid fa-pen-to-square"></i></h1>

<?php
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $devEmEdicao = R::load('dev', $id);//CARREGA O DEV DE TAL ID

        if($devEmEdicao->atividade == 'Ativo'){
            $checkAtividade = 'checked';
        } else if($devEmEdicao->atividade == 'Inativo'){
            $checkAtividade = '';
        } else {
            echo "<p style='color:red;text-align:center;'>Ocorreu um erro. Por favor <a href='../listagem.php' style='color:darkred;'>volte</a> e tente de novo.</p>";
        }

        if($devEmEdicao->adm == '✔️'){
            $checkAdm = 'checked';
        } else if($devEmEdicao->adm == '❌'){
            $checkAdm = '';
        }

        $a = 'Junior';
        $b = 'Pleno';
        $c = 'Sênior';

if($devEmEdicao->nivel == $a){
    $a = 'selected';
} else if ($devEmEdicao->nivel == $b){
    $b = 'selected';
} else if ($devEmEdicao->nivel == $c){
    $c = 'selected';
}

?>

<form action='gravarEdicao.php' method='get'><!--FORMULÁRIO-->
    <table cellpadding='10' cellspacing='0' style='margin: 0px auto;'><!--TABELA-->
        <tr>
            <td><label for='newEmail'>EMAIL:</label></td>
            <td><input type='text' name='newEmail' id='newEmail' value='<?=$devEmEdicao['email']?>' maxlength='250' required></td><!--EMAIL-->
        </tr>
        <tr>
            <td><label for='newSenha'>SENHA:</label></td>
            <td><input type='password' name='newSenha' id='newSenha' value='<?=$devEmEdicao['senha']?>' maxlength='64' required></td><!--SENHA-->
        </tr>
        <tr>
            <td><label for='newAtividade'>ATIVO:</label></td>
            <td><input type='checkbox' name='newAtividade' id='newAtividade' value='true' <?= $checkAtividade ?>></td><!--ATIVIDADE-->
        </tr>
        <tr>
            <td><label for='newAdm'>ADMINISTRADOR:</label></td>
            <td><input type='checkbox' name='newAdm' id='newAdm' value='true' <?= $checkAdm ?>></td><!--ADMINISTRADOR-->
        </tr>
        <tr>
            <td><label for='newNome'>NOME:</label></td>
            <td><input type='text' name='newNome' id='newNome' value='<?=$devEmEdicao['nome']?>' maxlength='45'></td><!--NOME-->
        </tr>
        <tr>
            <td><label for='newNascimento'>NASCIMENTO:</label></td>
            <td><input type='date' name='newNascimento' id='newNascimento' required value='<?=$devEmEdicao['nascimento']?>'></td><!--NOME-->
        </tr>
        <tr>
            <td><label for='newNivel'>NÍVEL:</label></td>
            <td><select name="newNivel" id="newNivel" style='font-size:larger;'>
                <option value="junior" <?= $a ?>>Junior</option>
                <option value="pleno" <?= $b ?>>Pleno</option>
                <option value="senior" <?= $c ?>>Sênior</option>
            </select></td>
        </tr>
        <tr>
            <td><p>ID:</p></td>
            <td><input id='idForm' name='id' value='<?= $devEmEdicao['id'] ?>' readonly='readonly'></input></td><!--ID-->
        </tr>
        <tr>
            <td colspan='2' style='text-align:right;'><button style='font-size: 18pt;'>Enviar</button></td><!--ENVIAR-->
        </tr>
    </table>
</form>
<?php 
    } 
    require_once '../template/menu2.php';
?>

</body>
</html>