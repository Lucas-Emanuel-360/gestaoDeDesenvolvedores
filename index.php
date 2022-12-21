<?php
    require_once 'class/rb-mysql.php';
$conn = R::setup( 'mysql:host=localhost;dbname=sistema_gestao', 'root', 'aluno');
   
    R::close();
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
<header><p style="text-align: center;opacity:75%;font-size:10pt;">&copy; Clara Ribeiro e Lucas Emanuel ~ 2022</p><h1 style='text-align:center;'>Gestão de desenvolvedores e respectivas tarefas em projetos</h1></header>
       
    <ul class="fa-ul">
        <li><span class="fa-li"><a href='credenciamento.php'><i class="fa-solid fa-pen"></i></span>Credenciamento novo</a></li>
        <br>
        <li><span class="fa-li"><a href='projeto.php'><i class="fa-solid fa-code"></i></span>Novo projeto</a></li>
        <br>
        <li><span class="fa-li"><a href='listagem-dev.php'><i class="fa-solid fa-list"></i></span>Listagem dos desenvolvedores</a></li>
        <br>
        <li><span class="fa-li"><a href='listagem-proj.php'><i class="fa-regular fa-clipboard"></i></span>Listagem dos projetos</a></li>
        <br>
        <li><span class="fa-li"><a href='sobre.php'><i class="fa-solid fa-info-circle"></i></span>Sobre nós</a></li>
    </ul>
    
</body>
</html>