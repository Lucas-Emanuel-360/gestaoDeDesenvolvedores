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
<header><p style="text-align: center;opacity:75%;font-size:10pt;">&copy; Clara Ribeiro e Lucas Emanuel ~ 2022</p><h1 style='text-align:center;'><i class="fa-solid fa-trash-can"></i></h1></header>
<?php
    if (isset($_GET['id'])) {//ID
        $id = $_GET['id'];
        $devAExcluir = R::load('dev', $id);//CARREGA O DEV DE TAL ID
        if(isset($_POST['decisao'])){
            if($_POST['decisao'] == 'sim'){
                R::trash($devAExcluir);
                echo "<h3 style='color:green;text-align:center;'>Dev excluído com sucesso!</h3>";
                echo "<table style='margin: auto;'><td><ul class='fa-ul'><li><span class='fa-li'><a href='../listagem.php'><i class='fa-solid fa-rotate-left'></i></span>Voltar</a></li></ul></td></table>";
            } else if($_POST['decisao'] == 'nao'){
                echo "<h3 style='color:darkred;text-align:center;'>Dev não excluído!</h3>";
                echo "<table style='margin: auto;'><td><ul class='fa-ul'><li><span class='fa-li'><a href='../listagem.php'><i class='fa-solid fa-rotate-left'></i></span>Voltar</a></li></ul></td></table>";
            }
        } else{
?>
<h3 style='text-align:center;'>Excluir '<?=$devAExcluir->nome?>' <span style='color:black;-webkit-text-stroke: 1px darkred;'>permanentemente</span>?</h3>
<form action='excluir.php?id=<?=$id?>' method='post' style='text-align:center;'>
    <table style='margin: auto;'>
        <tr>
            <td>
                <input type='radio' value='sim' name='decisao' id='sim'>
                <label for='sim' style='color:green;'>Sim</label>
            </td>
            <td>
                <input type='radio' value='nao' name='decisao' id='nao'>
                <label for='nao' style='color:darkred;'>Não</label>
            </td>
        </tr>
    </table>
    <br><button style='box-align:center;font-size:15pt'>Confirmar</button>
</form>
<?php
        }

        

        R::close();
        require_once '../template/menu2.php';
    }


?>
</body>
</html>