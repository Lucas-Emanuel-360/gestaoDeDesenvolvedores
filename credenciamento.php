<?php
    require_once 'template/footer.php';
    require_once 'class/rb-mysql.php';
    $conn = R::setup( 'mysql:host=localhost;dbname=sistema_gestao', 'root');
    if ($conn){echo '';}
    else {echo "<h3 style='color:red;'>Conexão falha!</h3>";}
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
<?php
    if(isset($_GET['email']) && isset($_GET['senha'])){//DADOS
        $email = $_GET['email'];
        $senha = $_GET['senha'];
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

        $dev = R::dispense('dev');//ARMAZENAR NA TABLE
        $dev->email = $email;
        $dev->senha = $senha;
        $dev->atividade = $atividade;
        $dev->adm = $adm;
        $id = R::store($dev);//DETERMINAR ID

        if($dev->atividade == 'Ativo'){//MUDAR COR A DEPENDER DA ATIVIDADE
            $style = 'ativo';
        } else if($dev->atividade == 'Inativo'){//MUDAR COR A DEPENDER DA ATIVIDADE
            $style = 'inativo';
        } else {
            echo "<p style='color:red;text-align:center;'>Ocorreu um erro. Por favor <a href='listagem.php' style='color:darkred;'>volte</a> e tente de novo.</p>";
        }


        echo "<header><h3 style='color:green;'>Produto cadastrado com sucesso!</h3></header>";
        //echo "<div style='text-align:center;'><a href='extra/editar.php?id=$id'><i title='Editar' class='fa-solid fa-pen-to-square'></i></a></div><br>";
        echo "<table style='margin: auto;'><td><ul class='fa-ul'><li><span class='fa-li'><a href='index.php'><i class='fa-solid fa-rotate-left'></i></span>Voltar para o início</a></li></ul></td></table>";
        echo "<table style='margin: auto;'><td><ul class='fa-ul'><li><span class='fa-li'><a href='credenciamento.php'><i class='fa-solid fa-pen'></i></span>Novo credenciamento</a></li></ul></td></table>";

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
    else{
?>
<header><h1 style='text-align:center;'>Dados do desenvolvedor</h1></header><!--TÍTULO-->
<form action='credenciamento.php' method='get'><!--FORMULÁRIO-->
    <table cellpadding='10' cellspacing='0' style='margin: 0px auto;'><!--TABELA-->
        <tr>
            <td><label for='email'>EMAIL:</label></td>
            <td><input type='text' name='email' id='email' placeholder='Máximo de 250 caracteres' maxlength='250' required></td><!--EMAIL-->
        </tr>
        <tr>
            <td><label for='senha'>SENHA:</label></td>
            <td><input type='password' name='senha' id='senha' placeholder='Máximo de 64 caracteres' maxlength='64' required></td><!--SENHA-->
        </tr>
        <tr>
            <td><label for='atividade'>ATIVO:</label></td>
            <td><input type='checkbox' name='atividade' id='atividade' value='true' checked></td><!--ATIVIDADE-->
        </tr>
        <tr>
            <td><label for='adm'>ADMINISTRADOR:</label></td>
            <td><input type='checkbox' name='adm' id='adm' value='true' checked></td><!--ADMINISTRADOR-->
        </tr>
        <tr>
            <td colspan='2' style='text-align:right;'><button style='font-size: 18pt;'>Enviar</button></td><!--ENVIAR-->
        </tr>
    </table>
</form>
<?php
}
    
    R::close();
?>
</body>
</html>