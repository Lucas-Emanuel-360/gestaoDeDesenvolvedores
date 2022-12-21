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
        $projEmEdicao = R::load('proj', $id);//CARREGA O PROJ DE TAL ID

?>

<form action='gravarEdicao.php' method='get'><!--FORMULÁRIO-->
    <table cellpadding='10' cellspacing='0' style='margin: 0px auto;'><!--TABELA-->
        <tr>
            <td><label for='newNome'>NOME:</label></td>
            <td><input type='text' name='newNome' id='newNome' required placeholder='Máximo de 35 caracteres' maxlength='35' value='<?=$projEmEdicao['nome']?>'></td><!--NOME-->
        </tr>
        <tr>
            <td><label for='newInicio'>INÍCIO:</label></td>
            <td><input type='date' name='newInicio' id='newInicio' required value='<?=$projEmEdicao['inicio']?>'></td><!--INÍCIO-->
        </tr>
        <tr>
            <td><label for='newTerminoPlanejado'>TÉRMINO PLANEJADO:</label></td>
            <td><input type='date' name='newTerminoPlanejado' id='newTerminoPlanejado' required value='<?=$projEmEdicao['terminoPlanejado']?>'></td><!--TÉRMINO PLANEJADO-->
        </tr>
        <tr>
            <td><label for='newTermino'>TÉRMINO:</label></td>
            <td><input type='date' name='newTermino' id='newTermino' required value='<?=$projEmEdicao['termino']?>'></td><!--TÉRMINO-->
        </tr>
        <tr>
            <td><p>ID:</p></td>
            <td><input id='idForm' name='id' value='<?= $projEmEdicao['id'] ?>' readonly='readonly'></input></td><!--ID-->
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