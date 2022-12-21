<?php
/*ERRO LINHA 48, 49 E 50*/
    require_once 'class/rb-mysql.php';
$conn = R::setup( 'mysql:host=localhost;dbname=sistema_gestao', 'root', 'aluno');
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
<header><p style="text-align: center;opacity:75%;font-size:10pt;">&copy; Clara Ribeiro e Lucas Emanuel ~ 2022</p></header>

<?php
    if(isset($_GET['nome']) && isset($_GET['inicio']) && isset($_GET['terminoPlanejado']) && isset($_GET['termino'])){//DADOS
        $nome = $_GET['nome'];
        $inicio = $_GET['inicio'];
        $terminoPlanejado = $_GET['terminoPlanejado'];
        $termino = $_GET['termino'];

        $proj = R::dispense('proj');//ARMAZENAR NA TABLE
        $proj->nome = $nome;
        $proj->inicio = $inicio;
        $proj->terminoPlanejado = $terminoPlanejado;
        $proj->termino = $termino;
        $id = R::store($proj);//DETERMINAR ID

        echo "<header><h3 style='color:green;'>Projeto cadastrado com sucesso!</h3></header>";
        echo "<table style='margin: auto;'><td><ul class='fa-ul'><li><span class='fa-li'><a href='index.php'><i class='fa-solid fa-rotate-left'></i></span>Voltar para o início</a></li></ul></td></table>";
        echo "<table style='margin: auto;'><td><ul class='fa-ul'><li><span class='fa-li'><a href='projeto.php'><i class='fa-solid fa-pen'></i></span>Novo projeto</a></li></ul></td></table>";
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
    }
    else{
?>
<header><h1 style='text-align:center;'>Dados do projeto</h1></header><!--TÍTULO-->
<form action='projeto.php' method='get'><!--FORMULÁRIO-->
    <table cellpadding='10' cellspacing='0' style='margin: 0px auto;'><!--TABELA-->
        <tr>
            <td><label for='nome'>NOME:</label></td>
            <td><input type='text' name='nome' id='nome' required placeholder='Máximo de 35 caracteres' maxlength='35'></td><!--NOME-->
        </tr>
        <tr>
            <td><label for='inicio'>INÍCIO:</label></td>
            <td><input type='date' name='inicio' id='inicio' required></td><!--INÍCIO-->
        </tr>
        <tr>
            <td><label for='terminoPlanejado'>TÉRMINO PLANEJADO:</label></td>
            <td><input type='date' name='terminoPlanejado' id='terminoPlanejado' required></td><!--TÉRMINO PLANEJADO-->
        </tr>
        <tr>
            <td><label for='termino'>TÉRMINO:</label></td>
            <td><input type='date' name='termino' id='termino' required></td><!--TÉRMINO-->
        </tr>
        <tr>
            <td colspan='2' style='text-align:right;'><button style='font-size: 18pt;'>Enviar</button></td><!--ENVIAR-->
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