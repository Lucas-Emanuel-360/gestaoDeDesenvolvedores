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
        if(isset($_GET['decisao'])){
            if($_GET['decisao'] == 'sim'){
                R::exec('DROP TABLE dev, cred;');
                echo "<h3 style='color:green;text-align:center;'>Dados excluídos com sucesso!</h3>";
                echo "<table style='margin: auto;'><td><ul class='fa-ul'><li><span class='fa-li'><a href='../listagem-dev.php'><i class='fa-solid fa-rotate-left'></i></span>Voltar</a></li></ul></td></table>";
            } else if($_GET['decisao'] == 'nao'){
                echo "<h3 style='color:darkred;text-align:center;'>Dados não excluídos!</h3>";
                echo "<table style='margin: auto;'><td><ul class='fa-ul'><li><span class='fa-li'><a href='../listagem-dev.php'><i class='fa-solid fa-rotate-left'></i></span>Voltar</a></li></ul></td></table>";
            }
        } else{
$form = <<< CONFIRMACAO
<h3 style='text-align:center;'>Excluir todos os dados cadastrados <span style='color:black;-webkit-text-stroke: 1px darkred;'>permanentemente</span>?</h3>
<form action='excluirTodos.php' method='get' style='text-align:center;'>
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
CONFIRMACAO;
            echo $form;


            require_once '../template/menu2.php';
        R::close();
        }

?>
</body>
</html>