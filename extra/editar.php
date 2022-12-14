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
<h1 style='text-align:center;'><i class="fa-solid fa-pen-to-square"></i></h1>

<?php
    require_once '../class/rb-mysql.php';
    $conn = R::setup( 'mysql:host=localhost;dbname=sistema_gestao', 'root');
    if ($conn){echo '';}
    else {echo "<h3 style='color:red;'>Conexão falha!</h3>";}

    require_once '../template/footer2.php';
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $devEmEdicao = R::load('dev', $id);//CARREGA O DEV DE TAL ID
        
        if($devEmEdicao->ativo == 'Ativo'){
            $check = 'checked';
        } else if($devEmEdicao->ativo == 'Inativo'){
            $check = '';
        }
        if($devEmEdicao->adm == '✔️'){
            $check = 'checked';
        } else if($devEmEdicao->adm == '❌'){
            $check = '';
        }
?>

<form action='gravarEdicao.php' method='get'><!--FORMULÁRIO-->
    <table cellpadding='10' cellspacing='0' style='margin: 0px auto;'><!--TABELA-->
        <tr>
            <td><label for='newEmail'>EMAIL:</label></td>
            <td><input type='text' name='newEmail' id='newEmail' value='<?= $devEmEdicao['email'] ?>' required></td><!--NOME-->
        </tr>
        <tr>
            <td><label for='newSenha'>SENHA:</label></td>
            <td><input type='text' name='newSenha' id='newSenha' value='<?= $devEmEdicao['senha'] ?>' required></td><!--SENHA-->
        </tr>
        <tr>
            <td><label for='newAtivo'>ATIVO:</label></td>
            <td><input type='checkbox' name='newAtivo' id='newAtivo' value='true' <?= $check ?>></td><!--ATIVO-->
        </tr>
        <tr>
            <td><label for='newAdm'>ADMINISTRADOR:</label></td>
            <td><input type='checkbox' name='newAdm' id='newAdm' value='true' <?= $check ?>></td><!--ADMINISTRADOR-->
        </tr>
        <tr>
            <td colspan='2' style='text-align:right;'><button style='font-size: 18pt;'>Salvar</button></td><!--SALVAR-->
        </tr>
    </table>
<?php 
    } 
?>
</form>



</body>
</html>