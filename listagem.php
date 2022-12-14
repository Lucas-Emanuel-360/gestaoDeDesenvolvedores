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
    
<header><h1 style='text-align:center;'>Listagem</h1></header>

<table border='1' cellpadding='10' cellspacing='0' style='text-align:center;margin: 0px auto;'><!--TABELA-->
    <thead style='background-color:grey;color:white;'>
        <tr>
            <td>EMAIL</td>
            <td>SENHA</td>
            <td>ATIVIDADE</td>
            <td>ADMINISTRADOR</td>
            <td colspan=3>EXTRA</td><!--DETALHE, EXCLUSÃO E EDITAR-->
        </tr>
    </thead>
    <tbody>
<?php
    require_once 'class/rb-mysql.php';
    $conn = R::setup( 'mysql:host=localhost;dbname=sistema_gestao', 'root');
    if ($conn){echo '';}
    else {echo "<h3 style='color:red;'>Conexão falha!</h3>";}
    
    require_once 'template/footer.php';

    if(R::find('dev')){echo "<p style='font-size:20pt;text-align:center;'><a href='extra/excluirTodos.php'><i title='Excluir todos permanentemente' style='color:darkred;' class='fa-solid fa-trash-can'></i></a></p>";}
    else{echo "<h3>Nenhum dado credenciado.</h3>";}

    foreach (R::findAll('dev') as $dev) {//ITERAÇÃO
    if($dev->atividade == 'Ativo'){//MUDAR COR A DEPENDER DA ATIVIDADE
        $style = 'ativo';
    } else if($dev->atividade == 'Inativo'){//MUDAR COR A DEPENDER DA ATIVIDADE
        $style = 'inativo';
    } else {
        echo "<p style='color:red;text-align:center;'>Ocorreu um erro. Por favor <a href='listagem.php' style='color:darkred;'>volte</a> e tente de novo.</p>";
    }
?>
    <tr class='<?= $style ?>'>
        <td><?= $dev['email'] ?></td>
        <td><?= $dev['senha'] ?></td>
        <td class='<?= $style ?>'><?= $dev['atividade'] ?></td>
        <td><?= $dev['adm'] ?></td>
        <td><a href='extra/detalhamento.php?id=<?= $dev['id'] ?>'><i title='Ver detalhes' class="fa-solid fa-magnifying-glass"></i></a></td>
        <td><a href='extra/editar.php?id=<?= $dev['id'] ?>'><i title='Editar' class="fa-solid fa-pen-to-square"></i></a></td>
        <td><a href='extra/excluir.php?id=<?= $dev['id'] ?>'><i title='Excluir permanentemente' style='color:darkred;' class="fa-solid fa-trash-can"></i></a></td>
    </tr>
<?php
    }
    echo "<div style='text-align:center;'><a href='credenciamento.php'><i title='Novo credenciamento' class='fa-solid fa-plus'></i></a></div><br>";
        R::close();

?>
    </tbody>
</table>
</body>
</html>